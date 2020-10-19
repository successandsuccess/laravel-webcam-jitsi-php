<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\User;
use App\Meetings;
use App\VideoUploads;
use App\Reviews;
use App\Admin;
use App\PatientActivity;
use App\FirstFeedback;
use Auth;
use DateTime;
use App\SecondBeforeFeedback;
use App\SecondOneExerciseFeedback;
use App\SecondTotalExerciseFeedback;
use Carbon\Carbon;
use App\Rx;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getstarted(Request $request)
    {
        // providers
        $providers = Admin::all();
         // available time list
        $times = [
            'Select Time...',
            '01:45 PM',
            '02:00 PM',
            '02:15 PM',
        ];

        $user_id = Auth::user()->id;
        $rx_ids = [
            User::find($user_id)->rx_1,
            User::find($user_id)->rx_2,
            User::find($user_id)->rx_3
        ];

        // Patient
        $patient = User::with('getRx1', 'getRx2', 'getRx3', 'getProvider1')->find(Auth::user()->id);
        // dd($patient);
        $recommendedDuration = '30 minutes';
        $recommendedFrequency = '3x week';
        for( $i = 1; $i < 4; $i++ ) {
            if ( $patient['getRx'.$i] ) {
                if ($patient['getRx'.$i]->frequency == 'Daily') {
                    $recommendedDuration = $patient['getRx'.$i]->duration;
                    $recommendedFrequency = $patient['getRx'.$i]->frequency;
                    break;
                } else {
                    $recommendedDuration = $patient['getRx'.$i]->duration;
                    $recommendedFrequency = $patient['getRx'.$i]->frequency;
                }
            }
        }
        // check if provider and time info existed
        if ($request->input('provider') && $request->input('provider') != '') {
            $providerId = $request->input('provider');
            $timeId = $request->input('time');
        } else {
            $providerId = 0;
            $timeId = 0;
        }

        // check the progreess of this week
        $thisweekactivities = PatientActivity::where('user_id' , $user_id)
            ->where('type', 2) // self - directed sessions
            ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            // ->where('rx_id', $rx_ids[0])
            ->where('order', 1)
            ->get();
        // count of this week's self directed logs
        $countOfThisWeek = count($thisweekactivities);

        // calculate the review stars
        $weeklyStarReviews = $this->getStarReivews($user_id);
        // dd(($weeklyStarReviews[0]['mondayStar']);
        $mondayStar = $weeklyStarReviews[0]['mondayStar'];
        $tuesdayStar = $weeklyStarReviews[1]['tuesdayStar'];
        $wednesdayStar = $weeklyStarReviews[2]['wednesdayStar'];
        $thursdayStar = $weeklyStarReviews[3]['thursdayStar'];
        $fridayStar = $weeklyStarReviews[4]['fridayStar'];
        $saturdayStar = $weeklyStarReviews[5]['saturdayStar'];
        $sundayStar = $weeklyStarReviews[6]['sundayStar'];
      
        // dd($mondayStar, $tuesdayStar,$wednesdayStar, $thursdayStar, $fridayStar, $saturdayStar, $sundayStar);

        // History section
        $totalCompletedSessions = PatientActivity::where('user_id', $user_id)->where('type', 2)->get();
        // dd(count($totalCompletedSessions));
        $weeklySessionCompleted = PatientActivity::where('user_id', $user_id)->where('type', 2)->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        // dd($weeklySessionCompleted->count());
        $totalSessionLength = 0;
        foreach ( $totalCompletedSessions as $session )
        {
            $totalSessionLength += $session->length; 
        }
        // dd($totalSessionLength, count($totalCompletedSessions), $totalSessionLength / count($totalCompletedSessions));
        if ( count($totalCompletedSessions) != 0 ) {
            $averageSessionLength = round( ( $totalSessionLength / count($totalCompletedSessions) ) / 60, 1 ); // minute formate
        } else {
            $averageSessionLength = 0;
        }
        // dd($averageSessionLength);

        $consecutive_session_streak = $patient->consecutive_days;
        
        if ( $consecutive_session_streak == null || $consecutive_session_streak < 0) {
            $consecutive_session_streak = 0;
        }
        // dd($consecutive_session_streak);

        // draw the session calendar chart.
        $fromDateNeed = '2020-08-01';
        $calendarChartData = $this->getGoogleCalendarChartData($fromDateNeed);

        // dd($calendarChartData);
        return view('patient.getstarted', compact(
            'providerId', 
            'timeId', 
            'providers', 
            'times', 
            'patient', 
            'countOfThisWeek',
            'mondayStar',
            'tuesdayStar',
            'wednesdayStar',
            'thursdayStar',
            'fridayStar',
            'saturdayStar',
            'sundayStar',
            'recommendedDuration',
            'recommendedFrequency',
            'totalCompletedSessions',
            'weeklySessionCompleted',
            'averageSessionLength',
            'consecutive_session_streak',
            'calendarChartData'
        ));
    }

    public function patientcareplan() {
        $patient = User::find(Auth::user()->id);
        // dd($patient);
        return view('patient.careplan', compact('patient'));
    }

    public function patientwaiting(Request $request) {
        // get provider and time param from request
        $providerId = $request->input('provider');
        $timeId = $request->input('time');

        // provider list
        $providers = Admin::all();

        // available time list
        $times = [
            'Select Time...',
            '01:45 pm',
            '02:00 pm',
            '03:00 pm'
        ];

        // This is for Real Database datetime.
        $databaseTimes = [
            'Select Time...',
            '13:45:00',
            '14:00:00',
            '15:00:00',
        ];

        // $provider = $providers[$providerId];
        $provider = Admin::find($providerId);
        $time = $times[$timeId];
        $databaseTime = $databaseTimes[$timeId]; // This is for Real Database datetime.

        // Get current user
        $user = Auth::user();
        // Get Current Date
        $todayDate = date("Y-m-d");
        $todayDateTime = $todayDate." ".$databaseTime;

        // Get the meet info if meet already is booked.
        $prevMeeting = Meetings::where('userId' ,$user->id)
                                ->where('time', $todayDateTime)
                                ->where('provider_id', $provider->id)
                                ->first();
        
        if( $prevMeeting != null ) //when already existed meeting.
        {
            // get already existed jitsi meet
            $jitsimeet = $prevMeeting->meetUrl;
            $meetingId = $prevMeeting->id;
        }
        else // New meeting for new time and new provider
        {
            // make New jitsi meet
            $uuid = Uuid::generate()->string;
            $jitsimeet = env('VIDEO_PATIENT_URL').'/'. $uuid;
            
            // save New meet record
            $meeting = new Meetings;
            $meeting->provider_id = $provider->id;
            $meeting->time = $todayDateTime;
            $meeting->meetUrl = $jitsimeet;
            $meeting->userId = $user->id;
            $meeting->save();

            $meetingId = $meeting->id;

            // save to patient activities
            $patientActivity = new PatientActivity;
            $patientActivity->appoint_time = $todayDateTime;
            $patientActivity->length = 0;
            $patientActivity->type = 1;
            $patientActivity->completion = 0;
            $patientActivity->user_id = $user->id;
            $patientActivity->provider_id = $provider->id;
            $patientActivity->meetings_id = $meeting->id;
            $patientActivity->save();

            // Send Notify email to Provider
            $details = [
                'name' => $user->name,
                'email' => $user->email,
                'lname' => $user->lname,
                'phone' => $user->phone,
                'city' => $user->city,
                'meetUrl' => $jitsimeet,
                'time' => $todayDateTime,
            ];

            // send email to provider.
            \Mail::to('henry@patientconnect.io')->send(new \App\Mail\MeetNotifyMail($details));
        }
        return view('patient.waiting', compact('provider', 'time', 'jitsimeet', 'providerId', 'timeId', 'meetingId'));
    }

    public function patientwaitingready(Request $request, $meetingId) {
        $meeting = Meetings::find($meetingId);
        $time = $meeting->time->format('h:i a');

        // available time list
        $times = [
            'Select Time...',
            '01:45 pm',
            '02:00 pm',
            '03:00 pm'
        ];

        $timeId = array_search($time, $times, true);

        return view('patient.waiting-ready', compact('meeting', 'time', 'timeId'));
    }

    public function patientwaitingreadyfeedback(Request $request) 
    {
        // dd($request->all());
        $prevFeedback = FirstFeedback::where('meeting_id', $request->meetingId)->get();

        if ( count($prevFeedback) == 0 ) {
            $feedback = new FirstFeedback;
            $feedback->todaypain = $request->todaypain;
            $feedback->totalpain = $request->totalpain;
            $feedback->lastpain = $request->lastpain;
            $feedback->meeting_id = $request->meetingId;
            $feedback->save();
        } 

        return 'Success';
    }

    public function careplan_submitfeedback() {
        return view('patient.careplan_submitfeedback');
    }

    public function careplan_submitfeedback_post(Request $request) {
        $secondBeforeFeedback = new SecondBeforeFeedback;
        $secondBeforeFeedback->newaccident = $request->newAccident;
        $secondBeforeFeedback->newinjury = $request->newInjury;
        $secondBeforeFeedback->todaypain = $request->todaypain;
        $secondBeforeFeedback->user_id = Auth::user()->id;
        $secondBeforeFeedback->save();

        return 'Success';
    }

    public function careplan_exercises_overview() {
        $userId = Auth::user()->id;
        // dd($userId);
        $patient = User::with('getRx1', 'getRx2', 'getRx3', 'getProvider1')->find($userId);
        // dd($patient);
        return view('patient.careplan_exercises_overview', compact('patient'));
    }

    public function careplan_exercises_detail(Request $request) {
        // dd($request->all());
        $recordedVideoId = 0;
        $patientActivityId = 0;
        $order = 0;
        $exercisecount = 0;
        $original_consecutive_day = null;

        if( isset($request->order) ) {
            $order = $request->order;
        }

        if( isset($request->exercisecount) ) {
            $exercisecount = $request->exercisecount;
        }

        if( isset($request->recordedVideoId) ) {
            $recordedVideoId = $request->recordedVideoId;
        }

        if ( isset($request->patientActivityId)) {
            $patientActivityId = $request->patientActivityId;
        }

        if ( isset($request->original_consecutive_day) ) {
            $original_consecutive_day = $request->original_consecutive_day;
        }

        $patient = User::with('getRx1', 'getRx2', 'getRx3')->find(Auth::user()->id);
        $patientDetail = null;
        if( $order != 0 ) {
            if( $order == 1 ) {
                $patientDetail = $patient->getRx1;
            } else if( $order == 2 ) {
                $patientDetail = $patient->getRx2;
            } else {
                $patientDetail = $patient->getRx3;
            }
        }

        return view('patient.careplan_exercises_detail', compact('patient', 'recordedVideoId', 'patientActivityId', 'order', 'exercisecount', 'patientDetail', 'original_consecutive_day'));
    }

    public function careplan_exercises_detail_timerecord(Request $request)
    {
        // save the recorded time to videouploads table
        $timeRecord = new VideoUploads;
        $timeRecord->record_type = $request->record_type;
        $timeRecord->duration = $request->duration;
        $timeRecord->userId = Auth::user()->id;
        $timeRecord->save();

        // save recorded time activity to the patient actvitiy table
        $patientActivity = new PatientActivity;
        $patientActivity->appoint_time = $timeRecord->created_at; // current recorded time
        $patientActivity->type = 2; // self directed video record type.
        $patientActivity->length = $request->duration; // recorded video length
        $patientActivity->completion = 0; // session completion checking to view recordings from provider.
        $patientActivity->user_id = Auth::user()->id; // recorded patient
        $patientActivity->rx_id = $request->rx_id; // followed exercise id
        $patientActivity->order = $request->order; // completed exercise order
        $patientActivity->save();

        if ( $request->order == 1 ) {
                // check if this action is happen in same date or not.
                $TodayActivities = PatientActivity::where('type', 2)
                                                ->where('user_id', Auth::user()->id)
                                                ->where('order', 1)
                                                ->whereDate('created_at', '=', $patientActivity->created_at->toDateString())
                                                ->get();

                if( count($TodayActivities) < 2 ) {
                    // get the before date
                    $beforeDay = $patientActivity->created_at->subDays(1);

                    // find the record if activity is existed or not in yesterday
                    $activityCheck = PatientActivity::where('type', 2)->where('user_id', Auth::user()->id)->where('order', 1)->whereDate('created_at', '=', $beforeDay->toDateString())->get();
                    if ( count($activityCheck) > 0 ) {
                        $consecutive_day_save = User::find(Auth::user()->id);
                        $consecutive_day_save->consecutive_days = $consecutive_day_save->consecutive_days + 1;
                        $consecutive_day_save->save();
                    } else {
                        $consecutive_day_save = User::find(Auth::user()->id);
                        $consecutive_day_save->consecutive_days = 1;
                        $consecutive_day_save->save();
                    }
                }
        }

        return response()->json([
            'status' => 200,
            'recordedTimeId' => $timeRecord->id,
            'patientActivityId' => $patientActivity->id,
        ]);

        // return 'Success';
    }

    // delete the recorded video
    public function careplan_exercises_detail_removerecordedvideo(Request $request)
    {
        // dd($request->all());
        VideoUploads::where('id',$request->recordedVideoId)->delete();
        PatientActivity::where('id',$request->patientActivityId)->delete();
        $patient_consecutive_day = User::find(Auth::user()->id);
        $patient_consecutive_day->consecutive_days = $request->original_consecutive_day;
        $patient_consecutive_day->save();

        return response()->json([
            'status' => 200
        ]);

    }

    public function careplan_exercises_detail_oneexercisefeedback(Request $request)
    {
        // save the one exercise feedback after complete one exercise
        $oneExerciseFeedback = new SecondOneExerciseFeedback;
        $oneExerciseFeedback->feeling = $request->feeling;
        $oneExerciseFeedback->order = $request->order;
        $oneExerciseFeedback->user_id = Auth::user()->id;
        $oneExerciseFeedback->patientactivity_id = $request->patientActivityId;
        $oneExerciseFeedback->save();

        return 'Success';
    }

    public function careplan_exercises_review(Request $request) {
        // dd($request->exercisecount);
        $totalDuration = 0;
        $user_id = Auth::user()->id;
        $exerciseOne = SecondOneExerciseFeedback::with('getPatientActivity')->where('user_id', $user_id)->where('order', 1)->orderby('id', 'desc')->first();
        // dd($exerciseOne->getPatientActivity->length);
        $totalDuration += $exerciseOne->getPatientActivity->length;
        // dd($totalDuration);
        $exerciseTwo = SecondOneExerciseFeedback::with('getPatientActivity')->where('user_id', $user_id)->where('order', 2)->orderby('id', 'desc')->first();
        $totalDuration += $exerciseTwo->getPatientActivity->length;
        // dd($totalDuration);
        if ( $request->exercisecount >= 3 ) {
            $exerciseThree = SecondOneExerciseFeedback::with('getPatientActivity')->where('user_id', $user_id)->where('order', 3)->orderby('id', 'desc')->first();
            $totalDuration += $exerciseThree->getPatientActivity->length;
        }
        // dd($totalDuration);
        $minuteFormatDuration = round($totalDuration / 60, 2);
        // dd($minuteFormatDuration);

        $patient = User::find($user_id);

        return view('patient.careplan_exercises_review', compact('minuteFormatDuration', 'patient'));
    }

    public function careplan_exercises_totalexercisefeedback(Request $request)
    {
        // dd($request->all());
        $totalExerciseFeedback = new SecondTotalExerciseFeedback;
        $totalExerciseFeedback->todaypain = $request->todaypain;
        $totalExerciseFeedback->completable = $request->completable;
        $totalExerciseFeedback->difficult_level = $request->difficult_level;
        $totalExerciseFeedback->user_id = Auth::user()->id;
        $totalExerciseFeedback->save();

        return 'Success';
    }

    public function patientstreamrecord(Request $request) {
        $order = 0;
        $exercisecount = 0;
        $rx_id = 0;
        if( isset($request->order) ) {
            $order = $request->order;
            $rx_id = $request->rx_id;
        }

        if( isset($request->exercisecount) ) {
            $exercisecount = $request->exercisecount;
        }

        $exercise = Rx::find($rx_id);
        // dd($order,$exercisecount,$rx_id );
        return view('patient.streamrecord', compact('order', 'exercisecount', 'rx_id', 'exercise'));
    }

    public function upload(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        $duration = 0;
        $order = 0;
        $exercisecount = 0;
        $rx_id = 0;
        if ( isset($request->duration) ) {
            $duration = $request->duration;
        }
        if ( isset($request->order) ) {
            $order = $request->order;
        }
        if ( isset($request->exercisecount) ) {
            $exercisecount = $request->exercisecount;
        }
        if ( isset($request->rx_id) ) {
            $rx_id = $request->rx_id;
        }
        
        if ( 0 < $_FILES['file']['error'] ) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else {
            
            move_uploaded_file($_FILES['file']['tmp_name'], public_path('uploads') . '/' . $_FILES['file']['name']);
            $target_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $_FILES['file']['name'];

            //save the recorded video to uploadvideos table as record_type = 1
            $videoUpload = new VideoUploads;
            $videoUpload->videoUrl = $target_path;
            $videoUpload->userId = Auth::user()->id;
            $videoUpload->duration = $duration;
            $videoUpload->record_type = 1;
            $videoUpload->save();

            $patientActivity = new PatientActivity;
            $patientActivity->appoint_time = $videoUpload->created_at; // current recorded time
            $patientActivity->type = 2; // self directed video record type.
            $patientActivity->length = $duration; // recorded video length
            $patientActivity->completion = 0; // session completion checking to view recordings from provider.
            $patientActivity->videouploads_id = $videoUpload->id; // recorded video
            $patientActivity->user_id = Auth::user()->id; // recorded patient
            $patientActivity->order = $order;
            $patientActivity->rx_id = $rx_id;
            $patientActivity->save();

            //when remove the recorded video in detail exercise careplan page, will restore this consecutive day to avoid the change of this value 
            $original_consecutive_day = User::find(Auth::user()->id)->consecutive_days;

            if ( $original_consecutive_day == null ) {
                $original_consecutive_day = 0;
            }

            // process for consecutive days number
            if ( $order == 1 ) {

                // check if this action is happen in same date or not.
                $TodayActivities = PatientActivity::where('type', 2)
                                                    ->where('user_id', Auth::user()->id)
                                                    ->where('order', 1)
                                                    ->whereDate('created_at', '=', $patientActivity->created_at->toDateString())
                                                    ->get();

                if( count($TodayActivities) < 2 ) {
                    // get the before date
                    $beforeDay = $patientActivity->created_at->subDays(1);
                        
                    // find the record if activity is existed or not in yesterday
                    $activityCheck = PatientActivity::where('type', 2)->where('user_id', Auth::user()->id)->where('order', 1)->whereDate('created_at', '=', $beforeDay->toDateString())->get();
                    if ( count($activityCheck) > 0 ) {
                        $consecutive_day_save = User::find(Auth::user()->id);
                        $consecutive_day_save->consecutive_days = $consecutive_day_save->consecutive_days + 1;
                        $consecutive_day_save->save();
                    } else {
                        $consecutive_day_save = User::find(Auth::user()->id);
                        $consecutive_day_save->consecutive_days = 1;
                        $consecutive_day_save->save();
                    }
                }

                
            }

            // echo 'Success';
            return response()->json([
                'status' => 200,
                'recordedVideoId' => $videoUpload->id,
                'patientActivityId' => $patientActivity->id,
                'original_consecutive_day' => $original_consecutive_day
            ]);

        }
    }



    // calculate the google chart calendar data
    public function getGoogleCalendarChartData($from) {
        // Declare two dates 
        $Date1 = $from; 
        $Date2 = Carbon::now()->toDateString(); 

        // Declare an empty array 
        $array = array(); 

        // Use strtotime function 
        $Variable1 = strtotime($Date1); 
        $Variable2 = strtotime($Date2); 

        // dd($Variable2);

        // Use for loop to store dates into array 
        // 86400 sec = 24 hrs = 60*60*24 = 1 day 
        for ($currentDate = $Variable1; $currentDate <= $Variable2;  $currentDate += (86400)) { 
            $Store = date('Y-m-d', $currentDate); 
            $array[] = $Store; 
        } 

        $calendarChartData = [];
        // Display the dates in array format 
        // dd($array);
        foreach($array as $index => $item) {
            // dd($item);   
            $everyActivity = PatientActivity::where('type', 2)->where('user_id', Auth::user()->id)->whereDate('created_at', '=', $item)->get();
            if ( count($everyActivity) > 0 ) {
                $everyActivityOrdersArray = [];
                foreach ( $everyActivity as $single ) {
                    array_push($everyActivityOrdersArray, (int)($single->order));
                }
                // $calendarChartData[$item] = max($everyActivityOrdersArray);
                array_push($calendarChartData, [ 'date' => $item, 'value' => max($everyActivityOrdersArray) ]);
            } else {
                // $calendarChartData[$item] = 0;
                array_push($calendarChartData, [ 'date' => $item, 'value' => 0 ]);
            }
        }

        return $calendarChartData;
    }

    public function getStarReivews($user_id) {
        // every day activity checking.
        $monday = Carbon::now()->startOfWeek();
        $tuesday = $monday->copy()->addDay();
        $wednesday = $tuesday->copy()->addDay();
        $thursday = $wednesday->copy()->addDay();
        $friday = $thursday->copy()->addDay();
        $saturday = $friday->copy()->addDay();
        $sunday = $saturday->copy()->addDay();
        // dd($monday->toDateString(), $tuesday->toDateString(), $wednesday->toDateString(), $thursday->toDateString(), $friday->toDateString(), $saturday->toDateString(), $sunday->toDateString());
        $mActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    // ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $monday->toDateString())
                    ->get();
        $tActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    // ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $tuesday->toDateString())
                    ->get();
        $wActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    // ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $wednesday->toDateString())
                    ->get();
        $thActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    // ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $thursday->toDateString())
                    ->get();
        $fActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    // ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $friday->toDateString())
                    ->get();
        $satActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    // ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $saturday->toDateString())
                    ->get();
        $sunActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    // ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $sunday->toDateString())
                    ->get();

        // dd($mActivity, $tActivity, $wActivity, $thActivity, $fActivity, $satActivity, $sunActivity);

        // check today date
        if ( count($mActivity) > 0 ) {
            $mondayStar = 2; // yellow full star
        } else {
            if ( Carbon::now()->startOfDay() > $monday->startOfDay() ) {
                $mondayStar = 1; // grey star
            } else {
                $mondayStar = 0; // outlined star
            }
        }

        if ( count($tActivity) > 0 ) {
            $tuesdayStar = 2; // yellow full star
        } else {
            if ( Carbon::now()->startOfDay() > $tuesday->startOfDay() ) {
                $tuesdayStar = 1; // grey star
            } else {
                $tuesdayStar = 0; // outlined star
            }
        }

        if ( count($wActivity) > 0 ) {
            $wednesdayStar = 2; // yellow full star
        } else {
            if ( Carbon::now()->startOfDay() > $wednesday->startOfDay() ) {
                $wednesdayStar = 1; // grey star
            } else {
                $wednesdayStar = 0; // outlined star
            }
        }

        if ( count($thActivity) > 0 ) {
            $thursdayStar = 2; // yellow full star
        } else {
            if ( Carbon::now()->startOfDay() > $thursday->startOfDay() ) {
                $thursdayStar = 1; // grey star
            } else {
                $thursdayStar = 0; // outlined star
            }
        }

        if ( count($fActivity) > 0 ) {
            $fridayStar = 2; // yellow full star
        } else {
            if ( Carbon::now()->startOfDay() > $friday->startOfDay() ) {
                $fridayStar = 1; // grey star
            } else {
                $fridayStar = 0; // outlined star
            }
        }

        if ( count($satActivity) > 0 ) {
            $saturdayStar = 2; // yellow full star
        } else {
            if ( Carbon::now()->startOfDay() > $saturday->startOfDay() ) {
                $saturdayStar = 1; // grey star
            } else {
                $saturdayStar = 0; // outlined star
            }
        }

        if ( count($sunActivity) > 0 ) {
            $sundayStar = 2; // yellow full star
        } else {
            if ( Carbon::now()->startOfDay() > $sunday->startOfDay() ) {
                $sundayStar = 1; // grey star
            } else {
                $sundayStar = 0; // outlined star
            }
        }

        $starReviews = [];
        array_push($starReviews, ['mondayStar' => $mondayStar]);
        array_push($starReviews, ['tuesdayStar' => $tuesdayStar]);
        array_push($starReviews, ['wednesdayStar' => $wednesdayStar]);
        array_push($starReviews, ['thursdayStar' => $thursdayStar]);
        array_push($starReviews, ['fridayStar' => $fridayStar]);
        array_push($starReviews, ['saturdayStar' => $saturdayStar]);
        array_push($starReviews, ['sundayStar' => $sundayStar]);

        // dd($starReviews);
        return $starReviews;
    }

























    public function individual()
    {
        // get the exercises
        $patient = User::with('getRx1','getRx2','getRx3','getRx4','getRx5')->find(Auth::getUser()->id);
        return view('individual', compact('patient'));
    }

    public function recordvideo()
    {
        return view('recordvideo');
    }

    public function waiting(Request $request)
    {
        // get provider and time param from request
        $providerId = $request->input('provider');
        $timeId = $request->input('time');

        // $providers = [
        //     'Select Provider...',
        //     'Dr.Johns',
        //     'Dr.Wang',
        //     'Mr.Smith.CA'
        // ];
        
        $providers = Admin::all();
        // dd($providers);
        // available time list
        $times = [
            'Select Time...',
            '1:45 pm',
            '2:00 pm',
            '3:00 pm'
        ];

        // This is for Real Database datetime.
        $databaseTimes = [
            'Select Time...',
            '13:45:00',
            '14:00:00',
            '15:00:00',
        ];

        // $provider = $providers[$providerId];
        $provider = Admin::find($providerId);
        $time = $times[$timeId];
        $databaseTime = $databaseTimes[$timeId]; // This is for Real Database datetime.

        // Get current user
        $user = Auth::user();
        // Get Current Date
        $todayDate = date("Y-m-d");
        $todayDateTime = $todayDate." ".$databaseTime;

        // Get the meet info if meet already is booked.
        $prevMeeting = Meetings::where('userId' ,$user->id)
                                ->where('time', $todayDateTime)
                                ->where('provider_id', $provider->id)
                                ->first();
        
        if( $prevMeeting != null ) //when already existed meeting.
        {
            // get already existed jitsi meet
            $jitsimeet = $prevMeeting->meetUrl;
        }
        else // New meeting for new time and new provider
        {
            // make New jitsi meet
            $uuid = Uuid::generate()->string;
            $jitsimeet = env('VIDEO_PATIENT_URL').'/'. $uuid;
            
            // save New meet record
            $meeting = new Meetings;
            $meeting->provider_id = $provider->id;
            $meeting->time = $todayDateTime;
            $meeting->meetUrl = $jitsimeet;
            $meeting->userId = $user->id;
            $meeting->save();

            // save to patient activities
            $patientActivity = new PatientActivity;
            $patientActivity->appoint_time = $todayDateTime;
            $patientActivity->length = 0;
            $patientActivity->type = 1;
            $patientActivity->completion = 0;
            $patientActivity->user_id = $user->id;
            $patientActivity->provider_id = $provider->id;
            $patientActivity->meetings_id = $meeting->id;
            $patientActivity->save();

            // Send Notify email to Provider
            $details = [
                'name' => $user->name,
                'email' => $user->email,
                'lname' => $user->lname,
                'phone' => $user->phone,
                'city' => $user->city,
                'meetUrl' => $jitsimeet,
                'time' => $todayDateTime,
            ];

            // send email to provider.
            // \Mail::to('henry@patientconnect.io')->send(new \App\Mail\MeetNotifyMail($details));
        }

        return view('waiting', compact('provider', 'time', 'jitsimeet', 'providerId', 'timeId'));
    }

    public function streamrecord()
    {
        return view('streamrecord');
    }

    public function streamrecordreviewsubmit(Request $request)
    {
        $reviewData = $request->all();
        $review = new Reviews;
        $review->email =  $reviewData['email'];
        $review->name = $reviewData['name'];
        $review->completable = $reviewData['completable'];
        $review->completable_other = $reviewData['completable_other'];
        $review->difficult_answer = $reviewData['difficult_answer'];
        $review->qeeue = $reviewData['qeeue'];
        $review->qeeueb = $reviewData['qeeueb'];
        $review->qeeuec = $reviewData['qeeuec'];
        $review->exerciser = $reviewData['exerciser'];
        $review->save();

        
        // send review form email to patient
        // \Mail::to($reviewData['email'])->send(new \App\Mail\AttestationNotifyMail($reviewData));

        return 'Success';
    }

}

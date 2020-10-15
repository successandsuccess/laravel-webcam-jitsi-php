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

        // dd($user_id,$rx_ids);

        // Patient
        $patient = User::with('getRx1', 'getRx2', 'getRx3')->find(Auth::user()->id);
        // dd($patient);

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
            ->where('rx_id', $rx_ids[0])
            ->where('order', 1)
            ->get();
        // count of this week's self directed logs
        $countOfThisWeek = count($thisweekactivities);
        // dd($thisweekactivities, $countOfThisWeek);
        // every day activity checking.
        $monday = Carbon::now()->startOfWeek();
        $tuesday = $monday->copy()->addDay();
        $wednesday = $tuesday->copy()->addDay();
        $thursday = $wednesday->copy()->addDay();
        $friday = $thursday->copy()->addDay();
        $saturday = $friday->copy()->addDay();
        $sunday = $saturday->copy()->addDay();
        // dd($monday, $tuesday, $wednesday );
        $mActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $monday->toDateString())
                    ->get();
        $tActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $tuesday->toDateString())
                    ->get();
        $wActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $wednesday->toDateString())
                    ->get();
        $thActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $thursday->toDateString())
                    ->get();
        $fActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $friday->toDateString())
                    ->get();
        $satActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $saturday->toDateString())
                    ->get();
        $sunActivity = PatientActivity::where('user_id' , $user_id)
                    ->where('type', 2) // self - directed sessions
                    ->WhereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->where('rx_id', $rx_ids[0])
                    ->where('order', 1)
                    ->whereDate('created_at', '=', $sunday->toDateString())
                    ->get();
                    
        // dd($tActivity, isset($tActivity), count($tActivity), Carbon::now(),$thursday, Carbon::now()->startOfDay() >= $thursday->startOfDay());
      
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

        // dd($mondayStar, $tuesdayStar,$wednesdayStar, $thursdayStar, $fridayStar, $saturdayStar, $sundayStar);

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
            'sundayStar'
        ));
    }

    public function patientcareplan() {
        return view('patient.careplan');
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

        return view('patient.careplan_exercises_detail', compact('recordedVideoId', 'patientActivityId', 'order', 'exercisecount', 'patientDetail'));
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

        return 'Success';
    }

    public function careplan_exercises_detail_oneexercisefeedback(Request $request)
    {
        // save the one exercise feedback after complete one exercise
        $oneExerciseFeedback = new SecondOneExerciseFeedback;
        $oneExerciseFeedback->feeling = $request->feeling;
        $oneExerciseFeedback->order = $request->order;
        $oneExerciseFeedback->user_id = Auth::user()->id;
        $oneExerciseFeedback->save();

        return 'Success';
    }

    public function careplan_exercises_review() {
        return view('patient.careplan_exercises_review');
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

            // echo 'Success';
            return response()->json([
                'status' => 200,
                'recordedVideoId' => $videoUpload->id,
                'patientActivityId' => $patientActivity->id,
            ]);

        }
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

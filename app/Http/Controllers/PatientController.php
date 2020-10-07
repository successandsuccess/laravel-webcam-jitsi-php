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
use Auth;
use DateTime;


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
        // provider list
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
            '1:45pm',
            '2:00pm',
            '3:00pm',
        ];

        // check if provider and time info existed
        if ($request->input('provider') && $request->input('provider') != '') {
            $providerId = $request->input('provider');
            $timeId = $request->input('time');
        } else {
            $providerId = 0;
            $timeId = 0;
        }

        return view('patient.getstarted', compact('providerId', 'timeId', 'providers', 'times'));
    }

    public function patientcareplan() {
        return view('patient.careplan');
    }

    public function patientwaiting() {
        return view('patient.waiting');
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

        // provider list
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

    public function upload(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        $duration = 0;
        if ( isset($request->duration) ) {
            $duration = $request->duration;
        }
        
        
        if ( 0 < $_FILES['file']['error'] ) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else {
            
            move_uploaded_file($_FILES['file']['tmp_name'], public_path('uploads') . '/' . $_FILES['file']['name']);
            $target_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $_FILES['file']['name'];

    
            $videoUpload = new VideoUploads;
            $videoUpload->videoUrl = $target_path;
            $videoUpload->userId = Auth::user()->id;
            $videoUpload->duration = $duration;
            $videoUpload->save();

            $patientActivity = new PatientActivity;
            $patientActivity->appoint_time = $videoUpload->created_at; // current recorded time
            $patientActivity->type = 2; // self directed video record type.
            $patientActivity->length = $duration; // recorded video length
            $patientActivity->completion = 0; // session completion checking to view recordings from provider.
            $patientActivity->videouploads_id = $videoUpload->id; // recorded video
            $patientActivity->user_id = Auth::user()->id; // recorded patient
            $patientActivity->save();

            echo 'Success';

        }
    }
}

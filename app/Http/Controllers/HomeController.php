<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\User;
use App\Meetings;
use App\VideoUploads;
use Auth;
use DateTime;


class HomeController extends Controller
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
        $providers = [
            'Select Provider...',
            'Dr.Johns',
            'Dr.Wang',
            'Mr.Smith.CA'
        ];

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

        return view('getstarted', compact('providerId', 'timeId', 'providers', 'times'));
    }

    public function individual()
    {
        return view('individual');
    }

    public function demonstrate()
    {
        return view('demonstrate');
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
        $providers = [
            'Select Provider...',
            'Dr.Johns',
            'Dr.Wang',
            'Mr.Smith.CA'
        ];
        // available time list
        $times = [
            'Select Time...',
            '1:45pm',
            '2:00pm',
            '3:00pm'
        ];

        // This is for Real Database datetime.
        $databaseTimes = [
            'Select Time...',
            '13:45:00',
            '14:00:00',
            '15:00:00',
        ];

        $provider = $providers[$providerId];
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
                                ->where('provider', $provider)
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
            $jitsimeet = 'https://meet.jit.si/'. $uuid;
            
            // save New meet record
            $meeting = new Meetings;
            $meeting->provider = $provider;
            $meeting->time = $todayDateTime;
            $meeting->meetUrl = $jitsimeet;
            $meeting->userId = $user->id;
            $meeting->save();

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

            \Mail::to('henry@patientconnct.io')->send(new \App\Mail\MeetNotifyMail($details));
        }

        return view('waiting', compact('provider', 'time', 'jitsimeet', 'providerId', 'timeId'));
    }

    public function streamrecord()
    {
        return view('streamrecord');
    }

    public function upload(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        
        if ( 0 < $_FILES['file']['error'] ) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else {
            move_uploaded_file($_FILES['file']['tmp_name'], public_path('uploads') . '/' . $_FILES['file']['name']);
            $target_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $_FILES['file']['name'];
    
            $videoUpload = new VideoUploads;
            $videoUpload->videoUrl = $target_path;
            $videoUpload->userId = Auth::user()->id;
            $videoUpload->save();

            echo 'Success';

        }
    }

}

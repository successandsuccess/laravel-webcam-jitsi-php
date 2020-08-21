<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;

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

    public function getstarted()
    {
        return view('getstarted');
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
        $providerId = $request->input('provider');
        $timeId = $request->input('time');

        $providers = [
            'Dr.Johns',
            'Dr.Wang',
            'Mr.Smith.CA'
        ];
        $times = [
            '1:45pm',
            '2:00pm',
            '3:00pm'
        ];

        $provider = $providers[$providerId-1];
        $time = $times[$timeId-1];

        // make jitsi meet
        $uuid = Uuid::generate()->string;
        $jitsimeet = 'https://meet.jit.si/'. $uuid;

        return view('waiting', compact('provider', 'time', 'jitsimeet'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}

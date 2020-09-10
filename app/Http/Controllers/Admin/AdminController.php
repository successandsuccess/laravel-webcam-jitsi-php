<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return redirect()->route('admin.dashboard.patientqueue');
    }

    public function patientqueue()
    {
        return view('admin.patientqueue');
    }

    public function selfdirectedvisits()
    {
        return view('admin.selfdirectedvisits');
    }

    public function patientdirectory()
    {
        return view('admin.patientdirectory');
    }

    public function exercises()
    {
        return view('admin.exercises');
    }

}

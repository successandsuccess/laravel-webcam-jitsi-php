<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScreenshotController extends Controller
{
    public function index() 
    {
        return view('screenshot.imageeditor');
    }

    public function upload(Request $request) 
    {
        dd($request->input('uuid'));
    }
}

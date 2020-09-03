<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Screenshot;

class ScreenshotController extends Controller
{
    public function index() 
    {
        return view('screenshot.imageeditor');
    }

    public function upload(Request $request) 
    {
        $img = $request->input('image');
        $uuid = $request->input('uuid');

        $folderPath = public_path('uploads');

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath. '/' . $uuid . '.'.$image_type;

        file_put_contents($file, $image_base64);

        $screenshot = new Screenshot;
        $screenshot->url = $file;
        $screenshot->uuid = $uuid;
        $screenshot->save();

        echo 'Success';
    }
}

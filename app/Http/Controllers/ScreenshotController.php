<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;

class ScreenshotController extends Controller
{
    public function index() 
    {
        return view('screenshot.imageeditor');
    }

    public function upload(Request $request) 
    {
        // dd($request->input('uuid'));
        // $decodedImage = base64_decode($request->input('image'));
        $img = $request->input('image');

        $uuid = Uuid::generate()->string;

        $folderPath = public_path('uploads');

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath. '/' . $uuid . '.'.$image_type;

        dd($file);

        file_put_contents($file, $image_base64);

        // move_uploaded_file($_FILES['file']['tmp_name'], public_path('uploads') . '/' . $_FILES['file']['name']);
        // $target_path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $_FILES['file']['name'];

        $videoUpload = new VideoUploads;
        $videoUpload->videoUrl = $file;
        $videoUpload->userId = Auth::user()->id;
        $videoUpload->save();

        echo 'Success';
    }
}

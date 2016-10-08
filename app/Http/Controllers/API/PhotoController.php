<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Guest;
use App\Photo;
use App\Invite;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Events\PhotoUploaded;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');
        if (!$file->isValid()) {
            abort(404, 'The file is not valid');
        }

        $path = $file->store('moments');

        $photo = Photo::create([
            'path' => $path,
            'user_id' => auth()->user()->id
        ]);

        event(new PhotoUploaded($photo));

        return $photo;

    }
}

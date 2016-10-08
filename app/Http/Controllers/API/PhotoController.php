<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Guest;
use App\Photo;
use Validator;
use App\Invite;
use App\PainelPhoto;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Events\PhotoUploaded;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'image|max:10000',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $file = $request->file('file');
        if (!$file->isValid()) {
            abort(404, 'O arquvo não é válido.');
        }

        $path = $file->store('moments');

        $photo = Photo::create([
            'path' => $path,
            'user_id' => auth()->user()->id
        ]);

        if (PainelPhoto::first() == null){
            PainelPhoto::create([
                'photo_id' => $photo->id,
                'stars' => 0
            ]);
        }

        event(new PhotoUploaded($photo));

        return $photo;

    }
}

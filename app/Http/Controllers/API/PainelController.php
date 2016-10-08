<?php

namespace App\Http\Controllers\API;

use App\Photo;
use App\PainelPhoto;
use App\Http\Requests;
use App\Events\PhotoStared;
use Illuminate\Http\Request;
use App\Events\PainelPhotoAdded;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public function new()
    {
        $painelPhoto = PainelPhoto::create([
            'photo_id' => Photo::orderBy('created_at', 'desc')->get()->first()->id,
            'stars' => 0
        ]);

        event(new PainelPhotoAdded($painelPhoto));

        return $painelPhoto;
    }

    public function storeStars(Request $request)
    {
        $painelPhoto = PainelPhoto::where([
            'id' => $request->id
        ])->firstOrFail();

        $painelPhoto->increment('stars');

        $painelPhoto->save();

        event(new PhotoStared);
        return $painelPhoto;

    }

    public function lastest()
    {
        Return PainelPhoto::with('photo.user')
            ->orderBy('created_at', 'desc')
            ->first()
        ;
    }
}

<?php

namespace App\Http\Controllers\API;

use App\PainelPhoto;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public function photo(Request $request)
    {
        $painelPhoto = PainelPhoto::create([
            'photo_id' => $request->photo_id,
            'stars' => 0
        ]);

        event(new PainelPhotoAdded($painelPhoto));
    }

    public function storeStars(Request $request)
    {
        $painelPhoto = PainelPhoto::where([
            'id' => $request->id
        ])->firstOrFail();

        $painelPhoto->increment('stars');

        $painelPhoto->save();

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

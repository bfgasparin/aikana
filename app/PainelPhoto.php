<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PainelPhoto extends Model
{
    protected $fillable = ['photo_id', 'stars'];


    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}

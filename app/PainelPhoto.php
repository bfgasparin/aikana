<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PainelPhoto extends Model
{
    protected $fillable = ['photo_id', 'stars'];


    protected $appends = ['total_stars'];


    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function getTotalStarsAttribute()
    {
        return PainelPhoto::where('photo_id', $this->photo->id)
            ->get()
            ->sum('stars');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $fillable = ['path', 'user_id'];

    protected $appends = [
        'path_url'
    ];

    public function getPathUrlAttribute()
    {
        return Storage::url($this->path);    
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

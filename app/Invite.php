<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = ['expires_at', 'token'];
    
    protected $dates = [
        'expires_at',
        'accepted_at',
    ];

    public function isAccepted()
    {
        return !is_null($this->accepted_at);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}

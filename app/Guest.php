<?php

namespace App;

use Carbon\Carbon;
use App\Notifications\SendInvite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Guest extends Model
{
    use Notifiable;

    protected $fillable = ['email'];

    public function invites()
    {
        return $this->hasMany(Invite::class);
    }

    public function sendNewInvite()
    {
        $invite = $this->invites()->create([
            'token' => str_random(30),
            'expires_at' => Carbon::now()->addWeeks(1),
        ]);

        $this->notify(new SendInvite($invite));

        return $invite;
    }
}
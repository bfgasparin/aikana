<?php

namespace App;

use Storage;
use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPassword;
use App\Exceptions\EmailAlreadyVerified;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'social_avatar', 'avatar', 'facebook_id', 'google_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'avatar_url'
    ];

    public function invite()
    {
        return $this->belongsTo(Invite::class);
    }

    public function isAdmin()
    {
        return $this->id = config('admin.admin_user_id');
    }
    public function acceptedAnInvite()
    {
        return !empty($this->invite_id);
    }

    public function acceptInvite(Invite $invite)
    {
        $invite->accepted_at = Carbon::now();
        $invite->user()->save($this);

        $invite->save();

        return $this;
    }
    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar){
            return Storage::url($avatar);
        }

        return $this->social_avatar;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function confirmEmail()
    {
        if ($this->verified){
            throw new EmailAlreadyVerified(trans('email.confirmed.already'));
        }

        $this->verified = true;
        $this->save();

        return $this;
    }

    protected static function boot()
    {
        static::creating(function (User $user) {
            $user->email_token = str_random(30);
        });
    }

}

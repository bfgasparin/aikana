<?php

namespace App\Listeners;

use App\User;
use App\Notifications\ValidateEmail;
use App\Notifications\UserRegistered;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailConfirmation
{
    public function __construct()
    {
        //
    }

    /**
     * Sends user email confirmation
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->user;

        $user->notify(new ValidateEmail($user->email_token));

        if($adminUser = User::find(config('admin.admin_user_id'))) {
            $adminUser->notify(new UserRegistered($user));
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\EmailAlreadyVerified;
use App\User;

trait ValidatesEmail
{

    /**
     * Confirm user email from token
     *
     * @return Response
     */
    public function confirmEmail($token)
    {
        try {
            $user = User::where('email_token', $token)
                ->firstOrFail()
                ->confirmEmail()
            ;

            $title = trans('email.confirmed.title');
            $message = trans('email.confirmed.message', ['app'  => config('app.name')]);
        } catch (EmailAlreadyVerified $e) {
            $title = trans('error.whoops');
            $message = $e->getMessage();
        }

        return redirect('login')->with([
            'title' => $title,
            'status' => $message,
        ]);

    }

}
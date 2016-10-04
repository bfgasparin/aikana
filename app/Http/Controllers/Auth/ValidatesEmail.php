<?php

namespace App\Http\Controllers\Auth;

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

        $user = User::where('email_token', $token)
            ->firstOrFail()
            ->confirmEmail()
        ;

        auth()->login($user);

        return redirect('login')->with([
            'status', trans('email.confirmed.message', ['app'  => config('app.name')]),
            'title', trans('email.confirmed.title'),
        ]);

    }

}
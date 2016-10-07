<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Invite;
use App\User;
use Illuminate\Http\Request;

class InviteController extends Controller
{


    public function accept(Request $request, string $token)
    {
        $invite = Invite::whereToken($token)->first();

        $invite->guest->unreadNotifications->markAsRead();
        if ($invite->isAccepted()){
            return redirect('login')
                ->with('status', 'Este convite já foi usado e voçê não pode usá-lo novamente.')
            ;
        }

        $user = User::whereEmail($invite->guest->email)->first();

        // in case of a user already exists, it must accept the invite
        if($user){
            $user->acceptInvite($invite);

            return redirect('login')
                ->with('status', sprintf('Convite vinculado ao usuário \'%s\', e  aceito com sucesso', $user->username));
        }

        $request->session()->put('invite_id', $invite->id);

        return redirect('/');
    }
}

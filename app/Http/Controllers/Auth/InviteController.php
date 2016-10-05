<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Invite;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    public function accept(Request $request, string $token)
    {
        $invite = Invite::whereToken($token)->first();
        
        $invite->guest->unreadNotifications->markAsRead();
        if ($invite->isAccepted()){
            return $this->redirect('login')
                ->with('status', 'O convite já foi aceito e não precisa ser aceito novamente')
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
        
        return redirect('register');
    }
}

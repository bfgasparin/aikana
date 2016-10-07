<?php

namespace App\Http\Controllers\API;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Invite;
use App\User;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function invite(Guest $guest)
    {
        return $guest->sendNewInvite();
    }
}

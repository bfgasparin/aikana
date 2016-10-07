<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GuestController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user()->is_admin, 403);

        return view('guests.index');
    }
}

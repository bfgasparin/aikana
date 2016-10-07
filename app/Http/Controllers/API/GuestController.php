<?php

namespace App\Http\Controllers\API;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return Guest::all();
    }

    public function store(Request $request)
    {
        return Guest::create($request->all());
    }
}

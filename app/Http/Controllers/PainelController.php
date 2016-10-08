<?php

namespace App\Http\Controllers;

use App\PainelPhoto;
use App\Http\Requests;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    
    public function index()
    {
        return view('painel');
    }

    public function showStar()
    {
        return view('painel.star');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // hoofdpagina
    public function index()
    {
        return view('home.index');
    }

    // Contact pagina
    public function contact()
    {
        return view('home.contact');
    }
}

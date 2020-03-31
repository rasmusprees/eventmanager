<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mission;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }
}

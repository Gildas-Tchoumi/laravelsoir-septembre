<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //vue welcom
    public function welcome() {
        return view('welcome');
    }
    //vue de dashboard
    public function index() {
        return view('Layout.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // vue de login 
    public function login() {
        return view('Auth.loginpage');
    }

    // vue de message apres inscription
    public function message() {
        return view('Auth.messagview');
    }
    //vue welcom
    public function welcome() {
        return view('welcome');
    }
    //vue de dashboard
    public function index() {
        return view('Layout.dashboard');
    }
}

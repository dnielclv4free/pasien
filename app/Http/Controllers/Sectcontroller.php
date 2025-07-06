<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Sectcontroller extends Controller
{
    public function index() {
        return view();
    }
    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function dashboard() {

        $user=Auth::user();
        return view('dashboard',['user'=>$user]);
    }
}

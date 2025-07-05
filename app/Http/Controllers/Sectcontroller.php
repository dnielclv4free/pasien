<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('dashboard');
    }
}

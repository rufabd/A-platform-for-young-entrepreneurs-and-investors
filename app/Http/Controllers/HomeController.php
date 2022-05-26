<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

        if(Auth::user()->role == 'founder') {
            return view('founder.dashboard');
        } else if(Auth::user()->role == 'skilled') {
            return view('skilled.dashboard');
        } else if(Auth::user()->role == 'admin') {
            return view('admin.dashboard');
        } else if(Auth::user()->role == 'investor') {
            return view('investor.dashboard');
        } else {
            return view('home');
        }
    }
}

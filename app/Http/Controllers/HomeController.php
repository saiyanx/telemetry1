<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Check which type of user and redirect
    /*    if (auth()->check())
        {
          if (auth()->user()->user_type = 'Engineer') {
            return redirect()->intended(route('admin.login'));
          }
        }*/
        return view('home');
    }
}

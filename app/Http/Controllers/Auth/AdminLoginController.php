<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('guest:admin');
    }
    public function showLoginForm()
    {
      return view('auth/admin_login');
    }

    public function login(Request $request)
    {
      //validate form Data
      $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);
      $credentials = ['email'=>$request->email, 'password'=>$request->password];
      //Attempt to login the users
      if (Auth::guard('admin')->attempt($credentials, $request->remember))
      {
        //if successful redirect to intended location
        return redirect()->intended(route('admin.dashboard'));
      }
      //if unsuccessful redirect to login page with form data
      return redirect()->back()->withInput($request->only('email', 'remember'));

    }
}

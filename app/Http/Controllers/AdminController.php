<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth:admin');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    public function getAdminPage()
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }

    public function postAdminAssignRoles(Request $request)
    {
    //    dd($request);
        $user = User::findOrFail($request['id']);
    //    $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_engr']) {
            $user->roles()->attach(Role::where('Role_type', 'Engineer')->first());
            $user->save();
        }
        if ($request['role_supervisor']) {
            $user->roles()->attach(Role::where('Role_type', 'Supervisor')->first());
            $user->save();
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('Role_type', 'Administrator')->first());
            $user->save();
        }
        return redirect()->route('admin')->with('success','Member role updated successfully');
    }
}

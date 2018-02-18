<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Role;

class ManageUsersController extends Controller
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable = [
      'name', 'designation', 'phone_number',  'email', 'password', 'user_type'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Display users
         $members = User::latest()->paginate(10);
         return view('manage.index',compact('members'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      //Display users
       $members = DB::table('users')->latest()->paginate(10);
        //Show the form for creating a new user
                return view('manage.create',compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, [
          'first_name' =>'required',
          'last_name' =>'required',
          'email' => 'required|unique:users,email',
          'password' => 'required',
        ]);



        //!!!!!!!!!!!problem with duplicate data, fix it
        //store the data
        $user = new User();

        if( $user->create($request->all()))
        {
            //Assign roles, roles can only be assigned after saving the
            // user as DB relationship is designed this way
            $user = User::all()->last();
            if ($request->roles!= null){
              for ($i=0; $i<count($request->roles); $i++)
              {
                $user->roles()->attach(Role::where('Role_type', $request->roles[$i])->first());
              }
            }
        return redirect()->route('manage.index')->with('success','User created successfully');
        }
        {
          return redirect()->back()->with('fail', 'An error occurred while creating the user.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
     public function show($id)
     {
         if ($member = User::findOrFail($id))
         {
         return view('manage.show',compact('member'));
         }
         else
         {
           return redirect()->back()->with('fail', 'An error occurred while fetching the user.');
         }
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //    public function edit(Member $member)
      //  $member = User::where('id', $member);
        $member = User::findOrFail($id);
      //  dd($id);
        return view('manage.edit',compact('member'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //validate the data
        $this->validate($request, [
          'first_name' =>'required',
          'last_name' =>'required',
          'email' => 'required',
          'password' => 'required',
        ]);
        //then update data
        $member = User::findOrFail($id);
        $request['password'] = bcrypt($request['password']);
        if ($member->update($request->all()))
    		{
    			  return redirect()->route('manage.index')->with('success','User updated successfully');
    		}
    		else
    		{
    			return redirect()->back()->with('fail', 'An error occurred while updating the user. Please check the logs')->withInput();
    		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
          User::destroy($id);
          return redirect()->route('manage.index')->with('success','User deleted successfully');
    }
}

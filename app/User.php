<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //Make relationship between roles and users table in user_role table
    public function roles()
    {
      return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    //Check if has any role for so to grant access in only allowed routes
    public function hasAnyRole($roles)
    {
      //First 'if' checks if user has many roles then $roles would be an array of roles as an input
      if (isarray($roles))
      {
        foreach ($roles as $role) {
          if ($this->hasRole($role))
          {
            return true;
          }
        }
      }
      //if its just a single role and not an array directly pass and check if user has the required role
      else
      {
        if ($this->hasRole($roles))
        {
          return true;
        }
      }
      // user does not have any role
      return false;
    }

    //Check which specific role the user has
    public function hasRole($role)
    {
      if($this->roles()->where('Role_type',$role)->first())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'designation', 'phone_number',  'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

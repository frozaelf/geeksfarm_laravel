<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
      protected $table = 'users';

   protected $hidden = array('password', 'remember_token');

    protected $guarded = array('id');

    protected $fillable = ['email', 'name', 'password'];

    public static function valid($id='', $pass_up='') {

      return array(

        'email' => 'required|email|unique:users,email'.($id ? ",$id" : ''),

        'name' => 'required|min: 6|unique:users,name'.($id ? ",$id" : ''),

        'password' => ($pass_up ? '' : "required|min: 8|confirmed")

      );

    }
	public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
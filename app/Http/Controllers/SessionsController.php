<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
class SessionsController extends Controller
{
	
    public function create()

  {

    return view('sessions.create');

  }
	
    public function store(Request $request)

  {

    $valid = array(

      'email' => 'required',

      'password' => 'required'

    );

    $validate = Validator::make($request->all(), $valid);

    if($validate->fails()) {

      return Redirect::to('signin')

        ->withErrors($validate)

        ->withInput();

    }

    if(Auth::attempt(array('email' => $request->email, 'password' => $request->password), ($request->remember ? true : false))) {

      Session::flash('notice', 'Login Success,' . $request->email);

      return Redirect::to('/');

      } else {

        Session::flash('error', 'Login Fails, Email or Password is wrong.');

        return Redirect::to('sessions/create')

          ->withInput();

      }

    }


  public function destroy()

  {

    Auth::logout();

    Session::flash('notice', 'Success Logout');

    return Redirect::to('/');

  }
}

<?php

  namespace App\Http\Controllers;

	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Redirect;
	use Illuminate\Support\Facades\Input;
	use Session;
	  use Illuminate\Http\Request;
	
	  use App\Http\Requests;
	
	  use App\Http\Controllers\Controller;
	
	  use App\Comment, App\Article;

  class CommentsController extends Controller {
  	
    public function __construct() {
      $this->middleware('reader', ['only' => 'create', 'store']);
    }
    public function store(Request $request)
asdasd
    {

      $validate = Validator::make($request->all(), Comment::valid());

      if($validate->fails()) {

        return Redirect::to('articles/'. $request->slug)

          ->withErrors($validate)

          ->withInput();

      } else {

        Comment::create($request->all());

        Session::flash('notice', 'Success add comment');

        return Redirect::to('articles/'. $request->slug);

      }

    }

  }
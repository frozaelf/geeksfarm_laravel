<?php

  namespace App\Http\Middleware;

  use Closure, Auth;

  class ReaderAuth

  {

    public function handle($request, Closure $next)

    {

      if(Auth::guest()) {

        return redirect('signin');

      } elseif (Auth::user()->role == 'reader') {

        return $next($request);

      } else {

        return response('Unauthorized.', 401);

      }

    }

  }
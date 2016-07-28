<?php

  namespace App\Http\Middleware;

  use Closure, Auth;

  class AdminAuth

  {

    public function handle($request, Closure $next)

    {

      if(Auth::guest()) {

        return redirect('signin');

      } elseif (Auth::user()->role == 'admin') {

        return $next($request);

      } else {

        return response('Unauthorized.', 401);

      }

    }

  }
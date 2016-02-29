<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role_user->nama_role != "Administrator"){
            \Session::flash('alert-warning','Maaf, hanya akun Administrator yang berhak mengkases module tersebut.');
            return redirect()->back();
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest() ) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/auth/login');
            }
        }

        if ( Auth::user()->status === 'N') {
            \Session::flash('alert-warning', 'Status tidak aktif silahkan hubungi administrator');
            $this->auth->logout();
            return redirect()->guest('/auth/login');
        }

        if(@Auth::user()->role_user->nama_role == null || @Auth::user()->personil->nama_personil == null){ // @ digunakan untuk memeriksa object ecksis 
            \Session::flash('alert-warning', 'Data user belum lengkap, mohon hubungi administrator untuk tetap login.');
            $this->auth->logout();
            return redirect()->guest('/auth/login');
        }

        return $next($request);
    }
}

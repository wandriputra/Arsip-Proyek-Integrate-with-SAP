<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role_user;

class RoleModule
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
        
        return $next($request);
    }
}

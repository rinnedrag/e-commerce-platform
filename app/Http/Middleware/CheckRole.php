<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!User::where('id', \Auth::id())->where('role', $role)->first()) {
            return redirect('login');
        }

        return $next($request);
    }

}

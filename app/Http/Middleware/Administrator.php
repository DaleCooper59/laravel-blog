<?php

namespace App\Http\Middleware;

use Closure;

class Administrator
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
        if(auth()->user()->username !== 'DaleCooper'){
            abort(403, 'vous n\'etes pas administrateur');
            
        }

        return $next($request);
    }
}

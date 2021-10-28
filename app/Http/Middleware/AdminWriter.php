<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminWriter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::user()) {
            return redirect('/');
        }
        if ( Auth::user()->hasAnyRole(['admin', 'writer']) ) {
            return $next($request);
        }
        return redirect('/');
    }
}

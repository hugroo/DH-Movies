<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if($request->user()){
            if($request->user()->isAdmin == 0){
                return redirect()->route('denied');
            }
            return $next($request);
        } else {
            return redirect()->route('denied');
        }
    }
}

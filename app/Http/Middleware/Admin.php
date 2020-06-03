<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::check())
        {
           
             $user = Auth::user();
            if($user->level == 0 || $user->level ==3 || $user->level== 4 || $user->level == 5 ){
            
                return $next($request);
            }
            else{
                return redirect()->route('404');
            }
        
        }
        else{
        return redirect()->route('404');
        }
    }
}

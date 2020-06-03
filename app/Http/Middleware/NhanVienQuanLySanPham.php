<?php

namespace App\Http\Middleware;

use Closure;

class NhanVienQuanLySanPham
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
            if($user->level == 5){
            return $next($request);
            }
            else{
                return redirect()->back();
            }
        
        }
        else{
            return redirect()->route('404');
        }
    }
}

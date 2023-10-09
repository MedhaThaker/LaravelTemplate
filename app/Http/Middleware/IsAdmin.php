<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;
use Session;
use Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Session::has('athletekar_admin*%') && Auth::guard('admin')->user()) {
            return $next($request);
        }
        Auth::logout();
        Session::flush();
        return redirect('admin');
    }
    // public function handle(Request $request, Closure $next)
    // {
    //     if(Session::has('anvil_admin*%') && Auth::guard('admin')->user()){
    //         return $next($request);
    //     }
    //     Auth::logout();
    //     Session::flush();
    //     return redirect('admin');
    // }
}

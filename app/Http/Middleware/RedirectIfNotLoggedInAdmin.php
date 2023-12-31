<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class RedirectIfNotLoggedInAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect(route('board.login.form'));
        }

        if (Auth::user()->is_active == 0 ) {
            Auth::logout();
            return redirect(route('board.login.form'))->with('error'  , 'غير مسموح لك بدخول النظام' );
        }

        if (Auth::user()->type != 1 ) {
            Auth::logout();
            return redirect(route('board.login.form'))->with('error'  , 'غير مسموح لك بدخول النظام' );
        }
        return $next($request);
    }
}

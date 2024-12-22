<?php

namespace App\Http\Middleware;
use App\Http\Kernel;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class CheckForPrice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->url('checkout') OR $request->url('checkout/pay')
         OR $request->url('checkout/success')) {
            if(Session::get('value') == 0) {
                return abort('403');
            } 
        }
        
        return $next($request);
    }
}

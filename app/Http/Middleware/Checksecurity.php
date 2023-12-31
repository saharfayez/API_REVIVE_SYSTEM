<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;
use Symfony\Component\HttpFoundation\Response;

class Checksecurity
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->checksecurity != env("API_VALIDATION")){
            return response()->json(['message'=> 'Unauthenticated .']);
        }
        return $next($request);
    }
}

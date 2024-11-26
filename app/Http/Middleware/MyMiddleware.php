<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $minimo, $maximo): Response
    {
        if ($request->route()->hasParameter('id')
            && (
                $request->route()->parameter('id') < $minimo
                ||
                $request->route()->parameter('id') > $maximo
            )
        ) {
            return redirect('/');
        }
        return $next($request);
    }
}

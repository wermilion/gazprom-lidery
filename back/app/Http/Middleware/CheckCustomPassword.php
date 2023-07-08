<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomPassword
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (Auth::guard('web')->user()->custom_password) {
            $response = response([
                'custom_password' => true,
            ]);
        } else {
            $response = response([
                'custom_password' => false,
            ]);
        }
        return $response;
    }
}

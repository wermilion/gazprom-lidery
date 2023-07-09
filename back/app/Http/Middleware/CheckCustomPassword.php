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
        if (!Auth::user()) {
            $response = response([
                'status' => false,
                'message' => 'Ошибка авторизации'
            ]);
        } else {
            if (Auth::guard('web')->user()?->custom_password) {
                $response = response([
                    'status' => true,
                    'message' => 'Авторизация прошла успешно',
                    'custom_password' => true,
                ]);
            } else {
                $response = response([
                    'status' => true,
                    'message' => 'Авторизация прошла успешно',
                    'custom_password' => false,
                ]);
            }
        }
        return $response;
    }
}

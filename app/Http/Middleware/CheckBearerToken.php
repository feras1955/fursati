<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class CheckBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Token مطلوب'
            ], 401);
        }

        $personalAccessToken = PersonalAccessToken::findToken($token);

        if (!$personalAccessToken) {
            return response()->json([
                'success' => false,
                'message' => 'Token غير صحيح'
            ], 401);
        }

        $user = $personalAccessToken->tokenable;
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'المستخدم غير موجود'
            ], 401);
        }

        Auth::login($user);

        return $next($request);
    }
} 
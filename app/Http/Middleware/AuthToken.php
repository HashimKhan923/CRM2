<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserToken;
use App\Models\User;


class AuthToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken(); // expects Authorization: Bearer <token>

        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        $hashed = hash('sha256', $token);

        $record = UserToken::where('token', $hashed)
            ->where(function ($q) {
                $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
            })
            ->first();

        if (!$record) {
            return response()->json(['message' => 'Invalid or expired token'], 401);
        }

        // Optional: set user as authenticated
        $user = User::find($record->user_id); // or similar

        auth()->setUser($user);

        return $next($request);
    }
}

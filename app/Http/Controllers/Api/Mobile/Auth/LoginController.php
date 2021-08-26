<?php

namespace App\Http\Controllers\Api\Mobile\Auth;

use App\Transformers\Api\UserTransformer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class LoginController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'your credential is wrong'],401);
        }else{
            Auth::attempt($credentials);
            $user = User::find(Auth::user()->id);
            $user['token'] = $token;
            $user['expires_in'] = auth('api')->factory()->getTTL() * 60;
            return fractal()->item($user)->transformWith(new UserTransformer)->toArray();
        }
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60 * 24 * 5
        ]);
    }
}

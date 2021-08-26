<?php

namespace App\Http\Middleware;

use Closure;
use Hash;

class ApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $nonhashkey = 'B*Zeu>&HWg9`jx*j';
        $token = $request->header('APP_KEY');
        $key = '$2y$10$/xYLg/U5L1HbdlKFa3XIwOQnYvYBYomKvBvCCMhgssT6ZgxfTJSru';

        if(!Hash::check($token,$key)){
            return \response()->json(['message' => 'app key not valid'],401);
        }


        return $next($request);
    }
}

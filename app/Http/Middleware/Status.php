<?php

namespace App\Http\Middleware;

use Closure;

class Status
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
        $user = auth()->user();

        if ($user->status == 0)
        {

                return redirect()->route('front');

        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

use Illuminate\Support\Facades\DB;

class Package
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


        $mytime=Carbon::now()->format('Y-m-d');


        if ($user->Subscription_expire_date<$mytime || $user->Subscription_expire_date==NULL) {
            if($user->isConsultant())
            {
                return redirect()->route('consultant.subscription.add');
            }
            if($user->isUniversity())
            {
                return redirect()->route('university.subscription.add');
            }
        }
        return $next($request);
    }
}

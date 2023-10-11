<?php

namespace App\Http\Middleware;

use App\Models\Generalsetting;
use Closure;
use Illuminate\Http\Request;

class Maintenance
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
        $gs = Generalsetting::find(1);

        if($gs->is_maintain == 1) {

                return redirect()->route('front-maintenance');
        }
        return $next($request);
    }
}

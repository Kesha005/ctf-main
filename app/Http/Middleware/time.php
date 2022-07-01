<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\game_timer;
use Illuminate\Support\Facades\Auth;

class time
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
        $date=game_timer::latest()->first();
        if(Auth::user()&& $date->status=='on_progress')
        {
            return $next($request);
        }
        return back()->with('error', 'Yarys entek baslanok');
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Team;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScorePageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $team = Team::where('subject_id', '=', $request->id)
            ->where('user_email', '=', Auth::user()->email)
            ->select('status')->first();

        if($team != null && $team->status == 1) {
            return $next($request);
        } else {
            return abort('403');
        }

    }
}

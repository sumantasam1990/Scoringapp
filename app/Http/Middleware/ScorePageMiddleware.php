<?php

namespace App\Http\Middleware;

use App\Models\Followers;
use App\Models\Subject;
use App\Models\Team;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        $userSubject = Subject::whereId($request->id)
            ->select('user_id')
            ->first();

        $followers = Followers::where('who_follow', '=', Auth::user()->id)
            ->where('whom_follow', '=', $userSubject->user_id)
            ->count('id');

        if($followers > 0) {
            return $next($request);
        } else {
            return abort('403');
        }


        // $team = Team::where('subject_id', '=', $request->id)
        //     ->where('user_email', '=', Auth::user()->email)
        //     ->select('status')->first();
//        $team = Team::where('subject_id', '=', $request->id)
//            ->select('status')->first();
//
//        if($team != null && $team->status == 1) {
//            return $next($request);
//        } else {
//            return abort('403');
//        }

    }
}

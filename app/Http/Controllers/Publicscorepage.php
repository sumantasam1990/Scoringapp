<?php

namespace App\Http\Controllers;

use App\Models\Followers;
use App\Models\Metro;
use App\Models\State;
use App\Models\Subject;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Publicscorepage extends Controller
{
    public function state_dash()
    {
        $states = State::all();
        return view('publicscorepage.state-list', ['states' => $states, 'title' => 'State Dashboard']);
    }

    public function metro_dash($id)
    {
        $stateName = State::whereId($id)->first();
        $metros = Metro::where('state_id', '=', $id)->get();
        $title = $stateName->name . ' Dashboard';
        return view('publicscorepage.metro-list', ['metros' => $metros, 'title' => $title, 'state_name' => $stateName]);
    }

    public function town_dash($id)
    {
        $metroName = Metro::whereId($id)->first();
        $towns = Town::where('metro_id', '=', $id)->get();
        $title = 'Town/Neighborhood Dashboard';
        return view('publicscorepage.town-list', ['towns' => $towns, 'title' => $title, 'metro_name' => $metroName]);
    }

    public function follow_scorePages($id)
    {
        $user = Auth::user();

        $town = Town::where('id', '=', $id)->first();
        $title = 'Follow Score Pages';

        $agents = DB::table('subjects')
            ->join('users', 'users.id', '=', 'subjects.user_id')
            ->where('subjects.town_id', '=', $id)
            ->select('users.name', 'users.id')
            ->get();

        $agentB = Followers::where('who_follow', '=', $user->id)
            ->select('who_follow')
            ->get();

        $agentA = Followers::where('whom_follow', '=', $user->id)
            ->select('whom_follow')
            ->get();

        return view('publicscorepage.follow-score-page', ['town' => $town, 'title' => $title, "agents" => $agents, 'agentB' => $agentB, 'agentA' => $agentA]);
    }
}

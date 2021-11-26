<?php

namespace App\Http\Controllers;

use App\Models\Metro;
use App\Models\State;
use App\Models\Town;
use Illuminate\Http\Request;

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
}

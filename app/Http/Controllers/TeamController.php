<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use DB;

class TeamController extends Controller
{
    public function index($id) {

        $subject = Subject::find($id);

        $teams = DB::select('SELECT users.name FROM teams LEFT JOIN users ON (users.id=teams.user_id) WHERE teams.subject_id = ?', [$id]);

        return view("team.index", ["title" => "Invite Team Members", "subject" => $subject, "teams" => $teams]);

    }

    public function store(Request $request) {

        //Validation

        $request->validate([
            'hd_sub' => 'required',
            't_email' => 'required|email',
            't_name'  => 'required'
        ]);

        $user = User::where("email", $request->t_email)->get();

        if(count($user) > 0) {

            $chkTeamExist = Team::where("user_id", $user[0]->id)->where("subject_id", $request->hd_sub)->get();

            if(count($chkTeamExist) == 0) {

                $team = new Team;

                $team->user_id = $user[0]->id;
                $team->subject_id = $request->hd_sub;

                $team->save();

                return back()
                    ->with('msg','Your have successfully added this ' . $request->t_name . '.');

            } else {
                return back()
                ->with('err','You have already added ' . $request->t_name . '.');
            }

        } else {
            return back()
                ->with('err','Sorry! You have entered wrong email ' . $request->t_email);

        }

    }
}

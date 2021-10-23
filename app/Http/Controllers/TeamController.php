<?php

namespace App\Http\Controllers;

use App\Http\Services\AddTeamMember;
use App\Models\Mainsubject;
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

        $teams = DB::select('SELECT users.name, teams.id, teams.status, teams.user_email FROM teams LEFT JOIN users ON (users.email=teams.user_email) WHERE teams.subject_id = ?', [$id]);

        return view("team.index", ["title" => "Invite Team Members", "subject" => $subject, "teams" => $teams]);

    }

    public function store(Request $request) {

        //Validation

        $request->validate([
            'hd_sub' => 'required',
            't_email' => 'required|email',
            't_name'  => 'required'
        ]);

        try{
            return (new AddTeamMember())->saveTeamMember($request->hd_sub, $request->t_email, $request->t_name);
        } catch(\Throwable $th) {
            //abort('403');
            return back()
                ->with('err', $th->getMessage());
        }

    }
}

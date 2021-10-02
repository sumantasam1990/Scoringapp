<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index() {
        return view("subject.index");
    }

    public function store(Request $request) {

        $user = Auth::user();

        // add on subject table
        $subject = new Subject;

        $subject->subject_name = $request->subject;
        $subject->user_id = $user->id;

        $subject->save();

        // add on Team table also
        $team = new Team;

        $team->user_id = $user->id;
        $team->subject_id = $subject->id; // Last inserted subject id

        $team->save();

        return redirect("/dashboard")->with("msg", "Your subject has been successfully added.");

    }
}

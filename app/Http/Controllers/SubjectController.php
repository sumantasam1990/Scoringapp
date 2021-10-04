<?php

namespace App\Http\Controllers;

use App\Models\Mainsubject;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index() {

        $user = Auth::user();

        $mainsubjects = Mainsubject::where("user_id", $user->id)->get();


        return view("subject.index", ['mainsubjects' => $mainsubjects]);

    }

    public function store(Request $request) {

        $request->validate([
            'main' => 'required',
            'subject' => 'required'
        ]);

        $user = Auth::user();

        // add on subject table
        $subject = new Subject;

        $subject->subject_name = $request->subject;
        $subject->user_id = $user->id;
        $subject->mainsubject_id = $request->main;

        $subject->save();

        // add on Team table also
        $team = new Team;

        $team->user_id = $user->id;
        $team->subject_id = $subject->id; // Last inserted subject id
        $team->mainsubject_id = $request->main;

        $team->save();

        return redirect("/dashboard")->with("msg", "Your subject has been successfully added.");

    }

    public function mainstore(Request $request) {
        $request->validate([
            'main_sub' => 'required',
        ]);

        $user = Auth::user();

        $mainsubject = new Mainsubject;

        $mainsubject->main_subject_name = $request->main_sub;
        $mainsubject->user_id = $user->id;

        $mainsubject->save();

        return back()->with("msg", "Your main subject has been successfully added.");
    }
}

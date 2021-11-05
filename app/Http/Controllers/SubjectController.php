<?php

namespace App\Http\Controllers;

use App\Http\Services\SubjectStore;
use App\Models\Mainsubject;
use Illuminate\Http\Request;
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
            //'main' => 'required',
            'subject' => 'required'
        ]);

        try {

            (new SubjectStore())->save($request->subject);

            return redirect("/dashboard")->with("msg", "A new Buyer has been added.");

        } catch (\Throwable $th) {
            return redirect("/dashboard")->with("err", "Error! " . $th->getMessage());
        }

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

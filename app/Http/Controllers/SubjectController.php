<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index() {
        return view("subject.index");
    }

    public function store(Request $request) {
        $subject = new Subject;

        $subject->subject_name = $request->subject;
        $subject->user_id = 1;

        $subject->save();

        return redirect()->back()->with("msg", "Your subject has been successfully added.");
    }
}

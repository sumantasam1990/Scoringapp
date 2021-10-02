<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function index() {

        $subject = User::find(1)->subject;
        //$subject = User::with('subject')->get();

        return view("applicant.index", ["title" => "Applicant", "subjects" => $subject]);
    }

    public function store(Request $request) {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = 'sca_' . uniqid() . time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        $applicant = new Applicant;

        $applicant->subject_id = $request->sub_id;
        $applicant->name = $request->name;
        $applicant->email = $request->email;
        $applicant->phone = $request->phone;
        $applicant->photo = $imageName;

        $applicant->save();

        return back()
            ->with('msg','You have successfully added an applicant.');

    }
}

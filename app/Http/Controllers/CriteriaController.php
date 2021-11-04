<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Maincriteria;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CriteriaController extends Controller
{
    public function index($id, $applid) {
        //get main subject name from subject ID
        $mainsubjectname = DB::table("mainsubjects")
            ->join("subjects", "mainsubjects.id", "=", "subjects.mainsubject_id")
            ->select("main_subject_name")
            ->where("subjects.id", "=", $id)->first();

        $maincriterias = Maincriteria::where("subject_id", $id)
            ->where('applicant_id', $applid)
            ->get();

        $subjects = Subject::where("id", $id)
        ->first();

        $applicant = Applicant::where('id', '=', $applid)
            ->select('name', 'email')
            ->first();

        // Create an array for priority
        $priorites_array = array(
        'Met Expectation (yellow)' => 'FCD40A',
        );

        return view("criteria.index", ["title" => "Criteria", "subjects" => $subjects, "priorites_array" => $priorites_array, "maincriterias" => $maincriterias, "sid" => $id, "mainsubjectname" => $mainsubjectname, "applid" => $applid, "applicant" => $applicant]);
    }

    public function store(Request $request) {
        //Validation
        $request->validate([
            'criteria' => 'required',
            'priority' => 'required',
            'subject'  => 'required',
            'main'     => 'required',
            'applicant_id' => 'required|exists:applicants,id'

        ]);

        $criteria = new Criteria;

        $criteria->subject_id = $request->subject;
        $criteria->title = $request->criteria;
        $criteria->priority = $request->priority;
        $criteria->maincriteria_id = $request->main;
        $criteria->note = $request->note;
        $criteria->applicant_id = $request->applicant_id;

        $criteria->save();

        return redirect('/score-page/' .  $request->subject)
            ->with('msg','Criteria has been successfully added.');

    }

    public function mainstore(Request $request) {
        $request->validate([
            'main_sub' => 'required',
            'hd_sub_id' => 'required',
            'hd_applicant_id' => 'required'
        ]);

        $user = Auth::user();

        $maincriteria = new Maincriteria;

        $maincriteria->criteria_name = $request->main_sub;
        $maincriteria->user_id = $user->id;
        $maincriteria->subject_id = $request->hd_sub_id;
        $maincriteria->applicant_id = $request->hd_applicant_id;

        $maincriteria->save();

        return back()->with("msg", "Your main criteria has been successfully added.");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Maincriteria;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CriteriaController extends Controller
{
    public function index($id) {

        //get main subject name from subject ID
        $mainsubjectname = DB::table("mainsubjects")
            ->join("subjects", "mainsubjects.id", "=", "subjects.mainsubject_id")
            ->select("main_subject_name")
            ->where("subjects.id", "=", $id)->first();

        $user = Auth::user();

        $maincriterias = Maincriteria::where("user_id", $user->id)->where("subject_id", $id)->get();

        //checking if it is main user who created the criteria or not
        $chk_main = Subject::select("id")
                            ->where("id", $id)
                            ->where("user_id", $user->id)
                            ->first();

        if( !empty($chk_main->id) ) {

            $subjects = Subject::where("id", $id)
            ->first();

            // Create an array for priority
            $priorites_array = array(
            'Green'                      =>     '138D07',
            'Light Green'                =>     '40F328',
            'Yellow'                     =>     'FCD40A',
            'Orange'                     =>     'F56A21',
            'Red'                        =>     'FC0A0A',
            );

            return view("criteria.index", ["title" => "Criteria", "subjects" => $subjects, "priorites_array" => $priorites_array, "maincriterias" => $maincriterias, "sid" => $id, "mainsubjectname" => $mainsubjectname]);

        } else {
            return back()->with("err", "You don't have access the \"Add Criteria\" Page.");
        }

    }

    public function store(Request $request) {

        //Validation

        $request->validate([
            'criteria' => 'required',
            'priority' => 'required',
            'subject'  => 'required',
            'main'     => 'required'
        ]);

        $criteria = new Criteria;

        $criteria->subject_id = $request->subject;
        $criteria->title = $request->criteria;
        $criteria->priority = $request->priority;
        $criteria->maincriteria_id = $request->main;

        $criteria->save();

        return redirect('/create-scoring-sheet/' .  $request->subject)
            ->with('msg','Criteria has been successfully added.');

    }

    public function mainstore(Request $request) {
        $request->validate([
            'main_sub' => 'required',
            'hd_sub_id' => 'required'
        ]);

        $user = Auth::user();

        $maincriteria = new Maincriteria;

        $maincriteria->criteria_name = $request->main_sub;
        $maincriteria->user_id = $user->id;
        $maincriteria->subject_id = $request->hd_sub_id;

        $maincriteria->save();

        return back()->with("msg", "Your main criteria has been successfully added.");
    }
}

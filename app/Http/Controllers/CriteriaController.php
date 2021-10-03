<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CriteriaController extends Controller
{
    public function index($id) {

        //$subject = Criteria::find(1)->subject;
        //$subjects = Subject::with('criteria')->get();

        $user = Auth::user();

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
            'Light Green or Green'       =>     '40F328,138D07',
            'Yellow and Light Green'     =>     'FCD40A,40F328',
            'Yellow'                     =>     'FCD40A',
            'Orange'                     =>     'F56A21',
            'Yellow and Orange'          =>     'FCD40A,F56A21',
            'Orange and Red'             =>     'F56A21,FC0A0A',
            'Red'                        =>     'FC0A0A',
            );

            return view("criteria.index", ["title" => "Criteria", "subjects" => $subjects, "priorites_array" => $priorites_array]);

        } else {
            return back()->with("err", "You don't have access the \"Add Criteria\" Page.");
        }

    }

    public function store(Request $request) {

        //Validation

        $request->validate([
            'criteria' => 'required',
            'priority' => 'required',
            'subject'  => 'required'
        ]);

        $criteria = new Criteria;

        $criteria->subject_id = $request->subject;
        $criteria->title = $request->criteria;
        $criteria->priority = $request->priority;

        $criteria->save();

        return back()
            ->with('msg','Criteria has been successfully added.');

    }
}

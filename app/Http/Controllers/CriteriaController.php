<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CriteriaController extends Controller
{
    public function index() {

        //$subject = Criteria::find(1)->subject;
        //$subjects = Subject::with('criteria')->get();

        $user = Auth::user();

        $subjects = User::find($user->id)->subject;

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

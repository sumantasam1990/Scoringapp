<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Score;
use App\Models\Subject;
use App\Models\User;

class ScoringSheetController extends Controller
{
    public function index($id)
    {

        $subjects = Subject::find($id)->criteria;
        $applicants = Subject::find($id)->applicant;

        //$dd = Subject::with(['criteria.score', 'applicant.score', 'score'])->where("id",$id)->get();

        $scores_array = array(
            1, 2, 3, 4, 5
        );

        //$subjects = Subject::with('criteria')->where("id","=",$id)->get();

        //$subjects = Subject::find($id)->criteria;

        //dd($subjects);

        return view("scores.index", ["title" => "Scoring Sheet", "subjects" => $subjects, "applicants" => $applicants, "scores_array" => $scores_array]);
    }

    public function store(Request $request)
    {

        //Validation

        $request->validate([
            'score_give' => 'required',
            'appl' => 'required',
            'sub'  => 'required',
            'crit_id' => 'required'
        ]);

        $score = new Score;

        $score->subject_id = $request->sub;
        $score->applicant_id = $request->appl;
        $score->criteria_id = $request->crit_id;
        $score->score_number = $request->score_give;

        $score->save();

        return back()
            ->with('msg', 'Score has been successfully added.');
    }
}

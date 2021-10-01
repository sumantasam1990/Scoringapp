<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Score;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            'crit_id' => 'required',
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $score = new Score;

        $score->user_id = $user->id; // session loggedin user id
        $score->subject_id = $request->sub;
        $score->applicant_id = $request->appl;
        $score->criteria_id = $request->crit_id;
        $score->score_number = $request->score_give;
        $score->notes = $request->note;

        if (!empty($request->image)) {

            //file upload

            $imageName = 'scF_' . uniqid() . time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);

            $score->score_files = $imageName;

        }

        $score->save();

        return redirect('/scoring-sheet/' . $request->sub)
            ->with('msg', 'Score has been successfully added.');
    }

    public function scoring($id)
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

        return view("scores.scoring_page", ["title" => "Scoring Sheet", "subjects" => $subjects, "applicants" => $applicants, "scores_array" => $scores_array]);
    }

    public function edit(Request $request) {

        if ($request->isMethod('post')) {
            //Validation

            $request->validate([
                'score_give' => 'required',
                'appl' => 'required',
                'sub'  => 'required',
                'crit_id' => 'required',
                //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            $score = Score::find($request->hd_id);

            //$score->user_id = 1; // session loggedin user id
            // $score->subject_id = $request->sub;
            // $score->applicant_id = $request->appl;
            // $score->criteria_id = $request->crit_id;

            $score->score_number = $request->score_give;
            $score->notes = $request->note;


            if ($request->has('image')) {

                //file upload

                $imageName = 'scF_' . uniqid() . time().'.'.$request->image->extension();

                $request->image->move(public_path('uploads'), $imageName);

                $score->score_files = $imageName;

            }

            $score->save();

            return redirect('/scoring-sheet/' . $request->sub)
                ->with('msg', 'Score has been successfully updated.');
        } else {
            $scores_array = array(
                1, 2, 3, 4, 5
            );

            $scores = Score::find($request->s);

            $returnHTML = view('scores.ajax_edit', ["data" => $scores, "scores_array" => $scores_array])->render();

            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }

    }

    public function delete($id) {

        $score = Score::find($id);

        $score->delete();

        return back()
                ->with('msg', 'Score has been successfully deleted.');

    }
}

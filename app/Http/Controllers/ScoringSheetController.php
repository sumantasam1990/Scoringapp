<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Metadata;
use App\Models\Score;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ScoringSheetController extends Controller
{
    public function index($id)
    {

        $subjs = Subject::where("id", $id)->first();
        $subjects = Subject::find($id)->criteria;
        $applicants = Subject::find($id)->applicant;

        //$dd = Subject::with(['criteria.score', 'applicant.score', 'score'])->where("id",$id)->get();

        $scores_array = array(
            1, 2, 3, 4, 5
        );

        //$subjects = Subject::with('criteria')->where("id","=",$id)->get();

        //$subjects = Subject::find($id)->criteria;

        //dd($subjects);

        return view("scores.index", ["title" => "Scoring Sheet", "subjects" => $subjects, "applicants" => $applicants, "scores_array" => $scores_array, "subjs" => $subjs]);
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
        $metadata = new Metadata;

        $score->user_id = $user->id; // session loggedin user id
        $score->subject_id = $request->sub;
        $score->applicant_id = $request->appl;
        $score->criteria_id = $request->crit_id;
        $score->score_number = $request->score_give;

        $score->save();

        $metadata->meta_notes = $request->note; // save into metadata
        $metadata->score_id = $score->id; // last insert score id

        if (!empty($request->image)) {

            //file upload

            $imageName = 'scF_' . uniqid() . time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);

            $metadata->meta_file = $imageName; // save into metadata

        }


        $metadata->save();

        return redirect('/scoring-sheet/' . $request->sub)
            ->with('msg', 'Score has been successfully added.');
    }

    public function scoring($id)
    {

        $subjs = Subject::where("id", $id)->first();
        $subjects = Subject::find($id)->criteria;

        //getting who created this subject
        $subj_user = Subject::select("user_id")
                            ->where("id", $id)
                            ->first();

        $applicants = DB::select('SELECT d.id,d.name, (SELECT SUM(scores.score_number) FROM scores WHERE user_id = ? AND subject_id = ? AND applicant_id = d.id) AS total FROM applicants AS d WHERE subject_id = ? ORDER BY total DESC', [$subj_user->user_id, $id, $id]);


        $scores_array = array(
            1, 2, 3, 4, 5
        );


        return view("scores.scoring_page", ["title" => "Scoring Sheet", "subjects" => $subjects, "applicants" => $applicants, "scores_array" => $scores_array, "subjs" => $subjs]);
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


            Score::where('id', $request->hd_id)
                    ->update(['score_number' => $request->score_give]); // update into score table

            $metadata = new Metadata;

            if ($request->has('image')) {

                //file upload

                $imageName = 'scF_' . uniqid() . time().'.'.$request->image->extension();

                $request->image->move(public_path('uploads'), $imageName);

                $metadata->meta_file = $imageName;

            }

            $metadata->meta_notes = $request->note; // save into metadata
            $metadata->score_id = $request->hd_id; // last insert score id

            $metadata->save();

            return redirect('/scoring-sheet/' . $request->sub)
                ->with('msg', 'Score has been successfully updated.');
        } else {
            $scores_array = array(
                1, 2, 3, 4, 5
            );

            //$scores = Score::find($request->s);


            $scores = DB::table('scores')
                        ->leftJoin('metadatas', 'scores.id', '=', 'metadatas.score_id')
                        ->where("scores.id", $request->s)
                        ->select('scores.id AS score_idd', 'scores.user_id', 'scores.subject_id', 'scores.applicant_id', 'scores.criteria_id', 'scores.score_number', 'metadatas.id AS metas_id', 'metadatas.score_id', 'metadatas.meta_notes', 'metadatas.meta_file')
                        ->get();


            $returnHTML = view('scores.ajax_edit', ["data" => $scores, "scores_array" => $scores_array, "v" => $request->v])->render();

            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }

    }

    public function delete($id) {

        $score = Score::find($id);

        $score->delete();

        return back()
                ->with('msg', 'Score has been successfully deleted.');

    }

    public function remove_note($id) {

        Metadata::where('id', $id)
                    ->update(['meta_notes' => ""]); // update into metadata table

        return back()
                ->with('msg', 'Your Note has been successfully deleted.');

    }

    public function remove_file($id) {

        Metadata::where('id', $id)
                    ->update(['meta_file' => ""]); // update into metadata table

        return back()
                ->with('msg', 'Your File has been successfully deleted.');

    }

    public function finalists($id) {

        $subjs = Subject::where("id", $id)->first();
        $subjects = Subject::find($id)->criteria;

        //getting who created this subject
        $subj_user = Subject::select("user_id")
                            ->where("id", $id)
                            ->first();

        $applicants = DB::select('SELECT d.id,d.name, (SELECT SUM(scores.score_number) FROM scores WHERE user_id = ? AND subject_id = ? AND applicant_id = d.id) AS total FROM applicants AS d WHERE subject_id = ? ORDER BY total DESC', [$subj_user->user_id, $id, $id]);


        $scores_array = array(
            1, 2, 3, 4, 5
        );


        return view("scores.finalist", ["title" => "Finalists", "subjects" => $subjects, "applicants" => $applicants, "scores_array" => $scores_array, "subjs" => $subjs]);

    }
}

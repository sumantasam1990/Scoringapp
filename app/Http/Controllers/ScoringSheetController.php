<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Criteria;
use App\Models\Finalist;
use App\Models\Maincriteria;
use App\Models\Mainsubject;
use App\Models\Metadata;
use App\Models\Score;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoringSheetController extends Controller
{
    public function index($id)
    {

        $authUser = Auth::user();

        $subjs = Subject::where("id", $id)->first();

        //$subjects = Subject::find($id)->criteria;

        $subjects = Criteria::where("subject_id", $id)->orderBy("maincriteria_id", "ASC")->get();

        $applicants = Subject::find($id)->applicant;

        $maincriterias = DB::select("SELECT maincriterias.`criteria_name`, maincriterias.`id` FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) WHERE criterias.`subject_id` = ? GROUP BY maincriterias.`id`", [$id]);

        //$dd = Subject::with(['criteria.score', 'applicant.score', 'score'])->where("id",$id)->get();


        $scores_array = array(
            'Greatly Exceeded Expectations' => '+3',
            'Exceeded Expectations' => '+2',
            'Slightly Exceeded Expectations' => '+1',
            'Met Expectations' => '0',
            'Slightly Failed Expectations' => '-1',
            'Failed Expectations' => '-2',
            'Greatly Failed Expectations' => '-3'
        );

        //$subjects = Subject::with('criteria')->where("id","=",$id)->get();

        //$subjects = Subject::find($id)->criteria;

        //dd($subjects);

        return view("scores.index", ["title" => "Scoring Sheet", "subjects" => $subjects, "applicants" => $applicants, "scores_array" => $scores_array, "subjs" => $subjs, "maincriterias" => $maincriterias, "sid" => $id, "authUser" => $authUser]);
    }

    public function store(Request $request)
    {

        //Validation

        $request->validate([
            'score_give' => 'required',
            'appl' => 'required',
            'sub' => 'required',
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

        // get score card no
        $minimum_no = Criteria::select("priority")
            ->where("id", "=", $request->crit_id)->first();

        if ($minimum_no->priority == "138D07") {
            $minimum = 5;
        }
        if ($minimum_no->priority == "40F328") {
            $minimum = 4;
        }
        if ($minimum_no->priority == "FCD40A") {
            $minimum = 3;
        }
        if ($minimum_no->priority == "F56A21") {
            $minimum = 2;
        }
        if ($minimum_no->priority == "FC0A0A") {
            $minimum = 1;
        }

        $score->score_card_no = ($request->score_give - $minimum);

        $score->save();

        $metadata->meta_notes = $request->note; // save into metadata
        $metadata->score_id = $score->id; // last insert score id

        if (!empty($request->image)) {

            //file upload

            $imageName = 'scF_' . uniqid() . time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);

            $metadata->meta_file = $imageName; // save into metadata

        }


        $metadata->save();

        return redirect('/score-page/' . $request->sub)
            ->with('msg', 'Score has been successfully added.');
    }

    public function scoring($id)
    {

        $subjs = Subject::where("id", $id)->first();
        $subjects = Criteria::where("subject_id", $id)->orderBy("maincriteria_id", "ASC")->get();

        $mainsubject = Mainsubject::where('id', '=', $subjs->mainsubject_id)
        ->select('main_subject_name', 'id')->first();

        $applicants = DB::select('SELECT d.id,d.name, (SELECT SUM(scores.score_number) FROM scores WHERE user_id = ? AND subject_id = ? AND applicant_id = d.id) AS total FROM applicants AS d WHERE subject_id = ? ORDER BY total DESC', [$subjs->user_id, $id, $id]);

        $maincriterias = DB::select("SELECT maincriterias.`criteria_name`, maincriterias.`id` FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) WHERE criterias.`subject_id` = ? GROUP BY maincriterias.`id`", [$id]);


        $scores_array = array(
            'Greatly Exceeded Expectations +3 (Very Dark Green)' => '+3',
            'Exceeded Expectations +2 ( Dark Green)' => '+2',
            'Slightly Exceeded Expectations +1 (Light Green)' => '+1',
            'Met Expectations 0 (Yellow)' => '0',
            'Slightly Failed Expectations -1 (Orange)' => '-1',
            'Failed Expectations -2 (Red)' => '-2',
            'Greatly Failed Expectations -3 (Dark Red)' => '-3'
        );


        return view("scores.scoring_page", ["title" => "Score Page", "subjects" => $subjects, "applicants" => $applicants, "scores_array" => $scores_array, "subjs" => $subjs, "maincriterias" => $maincriterias, "sid" => $id, 'mainsubject' => $mainsubject]);
    }

    public function edit(Request $request)
    {

        if ($request->isMethod('post')) {

            //Validation

            $request->validate([
                'score_give' => 'required',
                'appl' => 'required',
                'sub' => 'required',
                'crit_id' => 'required',
                //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            // get score card no
            $scorecriteriaid = Score::select('criteria_id')
                ->where('id', '=', $request->hd_id)->first();

            $minimum_no = Criteria::select("priority")
                ->where("id", "=", $scorecriteriaid->criteria_id)->first();

            if ($minimum_no->priority == "138D07") {
                $minimum = 5;
            }
            if ($minimum_no->priority == "40F328") {
                $minimum = 4;
            }
            if ($minimum_no->priority == "FCD40A") {
                $minimum = 3;
            }
            if ($minimum_no->priority == "F56A21") {
                $minimum = 2;
            }
            if ($minimum_no->priority == "FC0A0A") {
                $minimum = 1;
            }

            $score_card_no = ($request->score_give - $minimum);


            Score::where('id', $request->hd_id)
                ->update(['score_number' => $request->score_give, 'score_card_no' => $score_card_no]); // update into score table

            $metadata = new Metadata;

            if ($request->has('image')) {

                //file upload

                $imageName = 'scF_' . uniqid() . time() . '.' . $request->image->extension();

                $request->image->move(public_path('uploads'), $imageName);

                $metadata->meta_file = $imageName;

            }

            $metadata->meta_notes = $request->note; // save into metadata
            $metadata->score_id = $request->hd_id; // last insert score id

            $metadata->save();

            return redirect('/score-page/' . $request->sub)
                ->with('msg', 'Score has been successfully updated.');
        } else {
            $scores_array = array(
                'Greatly Exceeded Expectations +3 (Very Dark Green)' => '+3',
                'Exceeded Expectations +2 ( Dark Green)' => '+2',
                'Slightly Exceeded Expectations +1 (Light Green)' => '+1',
                'Met Expectations 0 (Yellow)' => '0',
                'Slightly Failed Expectations -1 (Orange)' => '-1',
                'Failed Expectations -2 (Red)' => '-2',
                'Greatly Failed Expectations -3 (Dark Red)' => '-3'
            );

            //$scores = Score::find($request->s);


            $scores = DB::table('scores')
                ->leftJoin('metadatas', 'scores.id', '=', 'metadatas.score_id')
                ->where("scores.id", $request->s)
                ->select('scores.id AS score_idd', 'scores.user_id', 'scores.subject_id', 'scores.applicant_id', 'scores.criteria_id', 'scores.score_number', 'metadatas.id AS metas_id', 'metadatas.score_id', 'metadatas.meta_notes', 'metadatas.meta_file')
                ->get();


            $returnHTML = view('scores.ajax_edit', ["data" => $scores, "scores_array" => $scores_array, "v" => $request->v])->render();

            return response()->json(array('success' => true, 'html' => $returnHTML));
        }

    }

    public function delete($id)
    {

        $score = Score::find($id);

        $score->delete();

        return back()
            ->with('msg', 'Score has been successfully deleted.');

    }

    public function remove_note($id)
    {

        Metadata::where('id', $id)
            ->update(['meta_notes' => ""]); // update into metadata table

        return back()
            ->with('msg', 'Your Note has been successfully deleted.');

    }

    public function remove_file($id)
    {

        Metadata::where('id', $id)
            ->update(['meta_file' => ""]); // update into metadata table

        return back()
            ->with('msg', 'Your File has been successfully deleted.');

    }

    public function finalists($id)
    {

        $subjs = Subject::where("id", $id)->first();
        $subjects = Criteria::where("subject_id", $id)->orderBy("maincriteria_id", "ASC")->get();

        $mainsubject = Mainsubject::where('id', '=', $subjs->mainsubject_id)
            ->select('main_subject_name')->first();


        $applicants = DB::select('SELECT d.id,d.name, finalists.`applicant_id`, (SELECT SUM(scores.score_number) FROM scores WHERE user_id = ? AND subject_id = ? AND applicant_id = d.id) AS total FROM applicants AS d RIGHT JOIN finalists ON (d.`id`=finalists.`applicant_id`) WHERE d.`subject_id` = ? ORDER BY total DESC', [$subjs->user_id, $id, $id]);

        $maincriterias = DB::select("SELECT maincriterias.`criteria_name`, maincriterias.`id` FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) WHERE criterias.`subject_id` = ? GROUP BY maincriterias.`id`", [$id]);

        //$maincriterias = DB::select("SELECT maincriterias.`criteria_name`, maincriterias.`id`, (SELECT sum(`score_number`) AS num FROM scores WHERE scores.`criteria_id` = criterias.`id`) AS total FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) LEFT JOIN scores ON (scores.`criteria_id`=criterias.`id`) WHERE scores.`subject_id` = ? AND criterias.`subject_id` = ? GROUP BY maincriterias.`id`", [$id, $id]);


        $scores_array = array(
            1, 2, 3, 4, 5
        );

        if(count($applicants) > 0 && count($maincriterias) > 0) {
            return view("scores.finalist", ["title" => "Finalists", "subjects" => $subjects, "applicants" => $applicants, "scores_array" => $scores_array, "subjs" => $subjs, "maincriterias" => $maincriterias, 'mainsubject' => $mainsubject]);

        } else {
            return redirect('/dashboard')->with('err', 'We don\'t have any data into the finalist page.');
        }



    }

    public function deletePage(Request $request)
    {
        try {
            $user = Auth::user();
            //checking if it is main user who created the score page/subject or not
            $chk_main = Subject::select("id")
                ->where("id", $request->subject_id)
                ->where("user_id", $user->id)
                ->first();

            if (!empty($chk_main->id)) {
                Score::where("subject_id", "=", $request->subject_id)
                    ->delete();

                Finalist::where("subject_id", "=", $request->subject_id)
                    ->delete();

                Criteria::where("subject_id", "=", $request->subject_id)
                    ->delete();

                Maincriteria::where("subject_id", "=", $request->subject_id)
                    ->delete();

                Applicant::where("subject_id", "=", $request->subject_id)
                    ->delete();

                return redirect('dashboard')
                    ->with("msg", "Your score page has been successfully deleted.");

            } else {
                return back()->with("err", "You don't have access to \"delete this score\" Page.");

            }

        } catch (\Exception $ex) {
            return "Error! " . $ex->getMessage();
        }
    }

    public function scorecard($id, $appl_id)
    {
        try {
            $subject = Subject::select('user_id', 'id')
                ->where('id', '=', $id)->first();

            $applicants = DB::select("SELECT d.id,d.name,d.email,d.phone,d.photo, (SELECT SUM(scores.score_number)
FROM scores WHERE subject_id = $id AND applicant_id = $appl_id AND user_id = $subject->user_id) AS total
FROM applicants AS d WHERE d.`subject_id` = $id AND d.id = $appl_id ORDER BY total DESC");

            /*
            * Get scoreboard
             * results as per each criteria
             * or the main user who have
             * created this subject
            */

            $scorecards = DB::select('select m.criteria_name as main_criteria, c.id as criteria_id, c.title as criteria_title, c.priority as criteria_priority, s.score_number from criterias c
join scores s on c.id = s.criteria_id join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ? and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ?', [$id, $id, $appl_id, $subject->user_id]);

            return view('scores.scorecard', ['title' => 'Scorecard', 'applicants' => $applicants[0], 'scorecards' => $scorecards, 'subject' => $subject]);
        } catch (\Throwable $th) {
            return abort('404');
        }

    }

    public function gridView(int $id, int $applicantId = null)
    {
        try {
            $subject = Subject::where('id', '=', $id)
                ->first();

            $mainsubject = Mainsubject::where('id', '=', $subject->mainsubject_id)
                ->select('main_subject_name', 'id')->first();

            $maincriterias = Criteria::where("subject_id", $id)->orderBy("maincriteria_id", "ASC")->get();

            if($applicantId == null) {
                $applicants = DB::select('SELECT d.id,d.name, (SELECT SUM(scores.score_number) FROM scores WHERE user_id = ? AND subject_id = ? AND applicant_id = d.id) AS total FROM applicants AS d WHERE subject_id = ? ORDER BY total DESC', [$subject->user_id, $id, $id]);

            } else {
                $applicants = DB::select('SELECT d.id,d.name, (SELECT SUM(scores.score_number) FROM scores WHERE user_id = ? AND subject_id = ? AND applicant_id = d.id) AS total FROM applicants AS d WHERE subject_id = ? AND d.id = ? ORDER BY total DESC', [$subject->user_id, $id, $id, $applicantId]);

            }

            $criterias = DB::select("SELECT maincriterias.*, criterias.* FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) WHERE criterias.`subject_id` = ?", [$id]);


            return view('scores.grid', ['title' => 'Score Page Grid View',
                'subject' => $subject, 'applicants' => $applicants, 'maincriterias' => $maincriterias,
                'criterias' => $criterias, 'mainsubject' => $mainsubject]);
        } catch (\Throwable $th) {
            return abort(403);
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Criteria;
use App\Models\Finalist;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    public function index($id)
    {
        //get main subject name from subject ID
        $mainsubjectname = DB::table("mainsubjects")
            ->join("subjects", "mainsubjects.id", "=", "subjects.mainsubject_id")
            ->where("subjects.id", "=", $id)->first();

        $subject = Subject::whereId($id)->first();
        //$subject = User::with('subject')->get();

        return view("applicant.index", ["title" => "Applicant", "subjects" => $subject, "mainsubjectname" => $mainsubjectname]);
    }

    public function store(Request $request)
    {

        $request->validate([
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $applicant = new Applicant;

        if ($request->has('image')) {

            $imageName = 'sca_' . uniqid() . time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);

            $applicant->photo = $imageName; /* Store $imageName name in DATABASE from HERE */

        }

        $applicant->subject_id = $request->sub_id;
        $applicant->name = $request->name;
        $applicant->email = $request->email;
        $applicant->phone = $request->phone;

        $applicant->save();

        return redirect('/create-scoring-sheet/' . $request->sub_id)
            ->with('msg', 'You have successfully added an applicant.');

    }

    public function viewApplicant($id, $subid)
    {

        $subjs = Subject::where("id", $subid)->first();
        $subjects = Criteria::where("subject_id", $subid)->orderBy("maincriteria_id", "ASC")->get();


        $applicants = DB::select('SELECT d.id,d.name,d.email,d.phone,d.photo, (SELECT SUM(scores.score_number)
        FROM scores WHERE subject_id = ? AND applicant_id = ?) AS total
        FROM applicants AS d WHERE d.`subject_id` = ? AND d.id = ? ORDER BY total DESC', [$subid, $id, $subid, $id]);


        $maincriterias = DB::select("SELECT maincriterias.`criteria_name`, maincriterias.`id` FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) WHERE criterias.`subject_id` = ? GROUP BY maincriterias.`id`", [$subid]);

        //$maincriterias = DB::select("SELECT maincriterias.`criteria_name`, maincriterias.`id`, (SELECT sum(`score_number`) AS num FROM scores WHERE scores.`criteria_id` = criterias.`id`) AS total FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) LEFT JOIN scores ON (scores.`criteria_id`=criterias.`id`) WHERE scores.`subject_id` = ? AND criterias.`subject_id` = ? GROUP BY maincriterias.`id`", [$subid, $subid]);


        return view("applicant.view", ["title" => "Applicant Details", "applicants" => $applicants, "subjects" => $subjects, "maincriterias" => $maincriterias, "subjs" => $subjs]);
    }

    public function add_finalist(Request $request)
    {

        $request->validate([
            'subid' => 'required',
            'appl_id' => 'required'
        ]);

        $finalist = new Finalist;

        $finalist->subject_id = $request->subid;
        $finalist->applicant_id = $request->appl_id;

        $finalist->save();

        return redirect('/finalists/' . $request->subid)
            ->with('msg', 'Successfully added to the finalist page.');

    }

    public function bulkEmails($id)
    {
        $mainsubjectname = DB::table("mainsubjects")
            ->join("subjects", "mainsubjects.id", "=", "subjects.mainsubject_id")
            ->where("subjects.id", "=", $id)->first();

        $subject = Subject::whereId($id)->first();

        $applicants = DB::table("applicants")
            ->join("bulkemails", "applicants.id", "=", "bulkemails.applicant_id")
            ->select("name", "email")
            ->where("bulkemails.subject_id", "=", $id)
            ->get();

        return view("applicant.bulkemail", ["title" => "Bulk Emails", "subjects" => $subject, "mainsubjectname" => $mainsubjectname, "applicants" => $applicants]);
    }

    public function downloadEmailListAsCSV(Request $request)
    {
        $fileName = uniqid() . time() . 'score-email-list.csv';
        $tasks = DB::select("select a.*,b.* from applicants a left join bulkemails b on a.id = b.applicant_id where b.subject_id = ?", [$request->hd_sub_id]);


        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = array('Applicant Name', 'Applicant Email');

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                fputcsv($file, array($task->name, $task->email));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

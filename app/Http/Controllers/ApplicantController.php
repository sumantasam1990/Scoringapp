<?php

namespace App\Http\Controllers;

use App\Http\Services\ApplicantStore;
use App\Models\Applicant;
use App\Models\Bulkemail;
use App\Models\Criteria;
use App\Models\Finalist;
use App\Models\Mainsubject;
use App\Models\Score;
use App\Models\Subject;
use Exception;
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



        return view("applicant.index", ["title" => "Applicant", "subjects" => $subject, "mainsubjectname" => $mainsubjectname]);
    }

    public function store(Request $request)
    {
        $request->validate([
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required',
            //'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'phone' => 'required|url',
            'sub_id' => 'required'
        ]);

        return (new ApplicantStore())->save($request->sub_id, $request->name, $request->email, $request->phone, $request->image);

    }

    public function viewApplicant($id, $subid)
    {

        $subjs = Subject::where("id", $subid)->first();
        $subjects = Criteria::where("subject_id", $subid)->orderBy("maincriteria_id", "ASC")->get();

        $mainsubject = Mainsubject::where('id', '=', $subjs->mainsubject_id)
            ->select('main_subject_name')->first();

        $applicants = DB::select('SELECT d.id,d.name,d.email,d.phone,d.photo, (SELECT SUM(scores.score_number)
        FROM scores WHERE subject_id = ? AND applicant_id = ?) AS total
        FROM applicants AS d WHERE d.`subject_id` = ? AND d.id = ? ORDER BY total DESC', [$subid, $id, $subid, $id]);


        $maincriterias = DB::select("SELECT maincriterias.`criteria_name`, maincriterias.`id` FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) WHERE criterias.`subject_id` = ? GROUP BY maincriterias.`id`", [$subid]);

        //$maincriterias = DB::select("SELECT maincriterias.`criteria_name`, maincriterias.`id`, (SELECT sum(`score_number`) AS num FROM scores WHERE scores.`criteria_id` = criterias.`id`) AS total FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) LEFT JOIN scores ON (scores.`criteria_id`=criterias.`id`) WHERE scores.`subject_id` = ? AND criterias.`subject_id` = ? GROUP BY maincriterias.`id`", [$subid, $subid]);


        return view("applicant.view", ["title" => "Applicant Details", "applicants" => $applicants, "subjects" => $subjects, "maincriterias" => $maincriterias, "subjs" => $subjs, 'mainsubject' => $mainsubject]);
    }

    public function add_finalist(Request $request)
    {

        $request->validate([
            'subid' => 'required',
            'appl_id' => 'required'
        ]);

        //checking if the logged in user is main user or not
        $subject = Subject::where('id', '=', $request->subid)
            ->where('user_id', '=', \Auth::user()->id)
            ->select('id')
            ->count('id');

       if($subject == 1) {
           $finalist = new Finalist;

           $finalist->subject_id = $request->subid;
           $finalist->applicant_id = $request->appl_id;

           $finalist->save();

           return redirect('/finalists/' . $request->subid)
               ->with('msg', 'Successfully added to the finalist page.');
       } else {
           return back()
               ->with('err', 'Sorry! You don\'t have permission to add applicant to the finalist page.');
       }

    }

    public function addEmailList(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'applicant_id' => 'required'
        ]);

        try {
            // if applicant already added on the same subject

            $chk = Bulkemail::where("subject_id", "=", $request->subject_id)
                ->where("applicant_id", "=", $request->applicant_id)
                ->select("id")
                ->first();

            if (empty($chk->id)) {
                $bulkemaillist = new Bulkemail;
                $bulkemaillist->subject_id = $request->subject_id;
                $bulkemaillist->applicant_id = $request->applicant_id;
                $bulkemaillist->save();

                return redirect('/bulkemaillist/' . $request->subject_id)->with("msg", "Applicant successfully added to the email list.");

            } else {
                return redirect('/bulkemaillist/' . $request->subject_id)->with("err", "Applicant already added on this subject.");

            }

        } catch (Exception $ex) {
            return "Error! " . $ex->getMessage();
        }

    }

    public function bulkEmails($id)
    {
        $mainsubjectname = DB::table("mainsubjects")
            ->join("subjects", "mainsubjects.id", "=", "subjects.mainsubject_id")
            ->where("subjects.id", "=", $id)->first();

        $subject = Subject::whereId($id)->first();

        $applicants = DB::table("applicants")
            ->join("bulkemails", "applicants.id", "=", "bulkemails.applicant_id")
            ->select("applicants.name", "applicants.email", "bulkemails.id", "applicants.id as applid")
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

    public function removeBulkEmail(Request $request)
    {
        try {
            Bulkemail::destroy([$request->hd_sub_id]);
            return back()->with("msg", "Applicants removed from the email list");
        } catch (Exception $ex) {
            return "Error! Please try again." . $ex->getMessage();
        }

    }

    public function removeApplicant(Request $request)
    {
        try {

            Applicant::destroy($request->applicant_id);
            Bulkemail::where("applicant_id", "=", $request->applicant_id)
                ->delete();
            Finalist::where("applicant_id", "=", $request->applicant_id)
                ->delete();
            Score::where("applicant_id", "=", $request->applicant_id)
                ->delete();

            return redirect('score-page/' . $request->subject_id)
                ->with("msg", "Applicant has been successfully removed.");

        } catch (Exception $ex) {
            return "Error! " . $ex->getMessage();
        }
    }
}

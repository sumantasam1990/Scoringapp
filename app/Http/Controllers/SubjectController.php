<?php

namespace App\Http\Controllers;

use App\Http\Services\SubjectStore;
use App\Mail\AddBuyer;
use App\Mail\AddBuyerNotify;
use App\Mail\RequestTeamMember;
use App\Models\Mainsubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SubjectController extends Controller
{
    public function index() {

        $user = Auth::user();

        $mainsubjects = Mainsubject::where("user_id", $user->id)->get();

        return view("subject.index", ['mainsubjects' => $mainsubjects]);

    }

    public function store(Request $request) {

        $request->validate([
            //'main' => 'required',
            'subject' => 'required',
        ]);

        try {

            $subject = new Subject;
            $subject->user_id = Auth::user()->id;
            $subject->mainsubject_id = 1;
            $subject->subject_name = $request->subject;
            $subject->save();

            // Send Notification to all Agent B
            $mailData = [];
            $toemails = DB::table('followers')
                ->join('users', 'followers.who_follow', '=', 'users.id')
                ->where('followers.whom_follow', '=', Auth::user()->id)
                ->select('users.email')
                ->get();

            foreach ($toemails as $toemail) {
                Mail::to($toemail->email)->queue(new AddBuyerNotify($mailData));
            }



//            $token = Crypt::encrypt($request->subject . '|' . $request->mailid . '|' . Auth::user()->id . '|' . Auth::user()->email);
//            $mailData = array(
//                'name' => $request->subject,
//                'url' => url('/accept-invitation-buyer/' . $token),
//            );
//
//            Mail::to($request->mailid)->queue(new AddBuyer($mailData));

            //(new SubjectStore())->save($request->subject, $request->mailid);

            return redirect("/dashboard")->with("msg", "Score Page added successfully.");

        } catch (\Throwable $th) {
            return $th->getMessage();
            //return redirect("/dashboard")->with("err", "Error! " . $th->getMessage());
        }

    }

    public function mainstore(Request $request) {
        $request->validate([
            'main_sub' => 'required',
        ]);

        $user = Auth::user();

        $mainsubject = new Mainsubject;

        $mainsubject->main_subject_name = $request->main_sub;
        $mainsubject->user_id = $user->id;

        $mainsubject->save();

        return back()->with("msg", "Your main subject has been successfully added.");
    }
}

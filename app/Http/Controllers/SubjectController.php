<?php

namespace App\Http\Controllers;

use App\Http\Services\SubjectStore;
use App\Mail\AddBuyer;
use App\Mail\RequestTeamMember;
use App\Models\Mainsubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
            'mailid' => 'required'
        ]);

        try {

            $token = Crypt::encrypt($request->subject . '|' . $request->mailid . '|' . Auth::user()->id . '|' . Auth::user()->email);
            $mailData = array(
                'name' => $request->subject,
                'url' => url('/accept-invitation-buyer/' . $token),
            );

            Mail::to($request->mailid)->queue(new AddBuyer($mailData));

            //(new SubjectStore())->save($request->subject, $request->mailid);

            return redirect("/dashboard")->with("msg", "We have sent an email invitation to this buyer.");

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

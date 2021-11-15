<?php

namespace App\Http\Services;

use App\Mail\AddBuyer;
use App\Mail\AddBuyerNotify;
use App\Models\Agentbuyer;
use App\Models\Followers;
use App\Models\Mainsubject;
use App\Models\Subject;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SubjectStore
{
    public function save($token): void
    {
        $exp_token = explode('|', $token);
        $subjectt = $exp_token[0];
        $mailid = $exp_token[1];
        $userID = $exp_token[2];
        $userEmail = $exp_token[3];

        //$user = Auth::user();

            // main subject

            $main_subject = new Mainsubject;
            $main_subject->user_id = $userID;
            $main_subject->main_subject_name = '';
            $main_subject->save();

            // add on subject table
            $subject = new Subject;

            $subject->subject_name = $subjectt;
            $subject->user_id = $userID;
            $subject->mainsubject_id = $main_subject->id;

            $subject->save();

            // again insert subject
            $userAgent = User::where("email", $mailid)->first();

            $agentbuyer = new Agentbuyer;

            $agentbuyer->agent_id = $userID;
            $agentbuyer->buyer_email = $userAgent->email;
            $agentbuyer->subject_id = $subject->id;
            $agentbuyer->status = 1;

            $agentbuyer->save();

            // add on Team table also
            $team = new Team;

            $team->user_id = $userID;
            $team->user_email = $userEmail;
            $team->subject_id = $subject->id; // Last inserted subject id
           // $team->mainsubject_id = $submain;
            $team->status = 1;

            $team->save();


        // Send Notification to all Agent B
        $mailData = [];
        $toemails = DB::table('followers')
            ->join('users', 'followers.who_follow', '=', 'users.id')
            ->where('followers.whom_follow', '=', $userID)
            ->select('users.email')
            ->get();

        foreach ($toemails as $toemail) {
            Mail::to($toemail->email)->queue(new AddBuyerNotify($mailData));
        }

    }
}

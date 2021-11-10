<?php

namespace App\Http\Services;

use App\Mail\Contactus;
use App\Mail\RequestTeamMember;
use App\Models\Mainsubject;
use App\Models\Subject;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class AddTeamMember
{

    public function saveTeamMember($sub, $email, $name)
    {
        $user = User::where("email", $email)->first();

        if($user == null) {
            $token = Crypt::encrypt($email . '|' . $sub);
            $data = array(
                'name' => $name,
                'url' => url('/accept-invitation/' . $token),
            );

            $subb = Subject::select("mainsubject_id")->where("id", $sub)->first();
            $mainsubID = Mainsubject::select("id")->where("id", $subb->mainsubject_id)->first();

            $team = new Team;

            $team->user_email = $email;
            $team->subject_id = $sub;
            $team->mainsubject_id = $mainsubID->id;

            $team->save();

            $this->sendEmail($email, $data);

            return back()
                ->with('msg', 'We have sent an invitation email.');
        }

        $chkTeamExist = Team::where("user_email", $user->email)->where("subject_id", $sub)->get();

        if(count($chkTeamExist) > 0) {
            return back()
                ->with('err','You have already added ' . $name . '.');
        }

        $subb = Subject::select("mainsubject_id")->where("id", $sub)->first();

        $mainsubID = Mainsubject::select("id")->where("id", $subb->mainsubject_id)->first();

        $team = new Team;

        $team->user_email = $user->email;
        $team->subject_id = $sub;
        $team->mainsubject_id = $mainsubID->id;

        $team->save();

        $token = Crypt::encrypt($email . '|' . $sub);
        $data = array(
            'name' => $name,
            'url' => url('/accept-invitation/' . $token),
        );
        $this->sendEmail($email, $data);


        return back()
            ->with('msg','You have successfully added ' . $name . '.');
    }

    public function acceptTeamMember($token)
    {
        $exp = explode('|', $token);
        $email = $exp[0];
        $subId = $exp[1];

        Team::where('subject_id', '=', $subId)
            ->where('user_email', '=', $email)
            ->update(['status' => 1]);

        return redirect('/dashboard')
            ->with('msg','You have successfully accepted the invitation.');
    }

    public function addbuyer($email, $name)
    {
        $user = User::where("email", $email)->first();

        if($user == null) {
            $token = Crypt::encrypt($email . '|' . uniqid());
            $data = array(
                'name' => $name,
                'url' => url('/accept-invitation/' . $token),
            );

            //$subb = Subject::select("mainsubject_id")->where("id", $sub)->first();
            //$mainsubID = Mainsubject::select("id")->where("id", $subb->mainsubject_id)->first();

            $subject = new Subject;

            $subject->user_id = $user->id;
            $subject->subject_name = $name;

            $subject->save();

            $this->sendEmail($email, $data);

            return back()
                ->with('msg', 'We have sent an invitation email.');
        }

        $chkTeamExist = Subject::where("user_id", $user->id)->get();

        if(count($chkTeamExist) > 0) {
            return back()
                ->with('err','You have already added ' . $name . '.');
        }

        //$subb = Subject::select("mainsubject_id")->where("id", $sub)->first();

        //$mainsubID = Mainsubject::select("id")->where("id", $subb->mainsubject_id)->first();

        $subject = new Subject;

        $subject->user_id = $user->id;
        $subject->subject_name = $name;

        $subject->save();

        $token = Crypt::encrypt($email . '|' . uniqid());
        $data = array(
            'name' => $name,
            'url' => url('/accept-invitation/' . $token),
        );
        $this->sendEmail($email, $data);


        return back()
            ->with('msg','You have successfully added ' . $name . '.');
    }

    private function sendEmail($email, $mailData)
    {
        Mail::to($email)->queue(new RequestTeamMember($mailData));
    }

}

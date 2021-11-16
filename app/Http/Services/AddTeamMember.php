<?php

namespace App\Http\Services;

use App\Mail\Contactus;
use App\Mail\RequestTeamMember;
use App\Models\Agentbuyer;
use App\Models\Followers;
use App\Models\Mainsubject;
use App\Models\Subject;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AddTeamMember
{

    public function saveTeamMember($sub, $email, $name, $user_type)
    {

            $usertype = $user_type;
            $token = Crypt::encrypt($email . '|' . $sub . '|'. $usertype . '|' . \Auth::user()->id);

            if ($usertype == 'Agent') {
                $data = array(
                    'name' => $name,
                    'url' => url('/accept-invitation/'. $token),
                    'usertype' => $usertype
                );
            } elseif($usertype == 'Buyer') {
                $data = array(
                    'name' => $name,
                    'url' => url('/accept-invitation-buyer/'. $token),
                    'usertype' => $usertype
                );
            } else {
                return redirect('/dashboard')->with('err', 'Error! Something is wrong.');
            }

            $this->sendEmail($email, $data);

            return back()
                ->with('msg', 'We have sent an invitation email.');

    }

    public function acceptTeamMember($token)
    {
        $exp = explode('|', $token);

        if($exp[2] == 'Agent'){
            $follower = new Followers;
            $follower->who_follow = Auth::user()->id;
            $follower->whom_follow = $exp[3];
            $follower->subject_id = $exp[1];
            $follower->save();
        }

        // destroy cookie
        Session::forget('invite_agent_token', '/');

        return redirect('/dashboard')
            ->with('msg','You have successfully accepted the invitation.');
    }

    public function acceptInvitationBuyer($token)
    {
        $exp = explode('|', $token);

        if($exp[2] == 'Buyer'){
            $agent_buyer = new Agentbuyer;
            $agent_buyer->user_id = Auth::user()->id;
            $agent_buyer->subject_id = $exp['1'];
            $agent_buyer->save();

            // save team table
            $team = new Team;
            $team->user_id = $exp[3];
            $team->user_email = $exp['0'];
            $team->mainsubject_id = 0;
            $team->subject_id = $exp['1'];
            $team->save();
        }

        // destroy cookie
        Session::forget('invite_buyer_token');

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

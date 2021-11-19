<?php

namespace App\Http\Services;

use App\Mail\AddNewApplicant;
use App\Mail\Contactus;
use App\Models\Applicant;
use App\Models\Subject;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class ApplicantStore
{
    public function save($sub, $name, $email, $phone, $image, $note)
    {
        try {
            $user = Auth::user();
            $applicant = new Applicant;

            if (!empty($image)) {

                $imageName = 'sca_' . uniqid() . time() . '.' . $image->extension();

                $image->move(public_path('uploads'), $imageName);

                $applicant->photo = $imageName; /* Store $imageName name in DATABASE from HERE */

            }

            $applicant->subject_id = $sub;
            $applicant->name = $name;
            $applicant->email = $email;
            $applicant->phone = $phone;
            $applicant->important_note = $note;

            $applicant->save();

            // send email to all users to same subject
            $emails = DB::table('teams')
                ->join('users', 'users.email', '=', 'teams.user_email')
                ->where('teams.subject_id', '=', $sub)
                ->whereNotIn('teams.user_email', [$user->email])
                ->select('users.name', 'users.email')
                ->get();

            $emailAgentsB = DB::table('followers')
                ->join('users', 'users.id', '=', 'followers.who_follow')
                ->where('followers.subject_id', '=', $sub)
                ->where('followers.whom_follow', '=', $user->id)
                ->whereNotIn('followers.who_follow', [$user->id])
                ->select('users.name', 'users.email')
                ->get();

            $emailAgentsA = DB::table('subjects')
                ->join('users', 'users.id', '=', 'subjects.user_id')
                ->where('subjects.id', '=', $sub)
                ->whereNotIn('subjects.user_id', [$user->id])
                ->select('users.name', 'users.email')
                ->get();

            foreach ($emails as $email) {
                $mailData = [
                    'name' => $email->name,
                    'url' => url('/score-page/' . $sub)
                ];

                $this->sendEmail($email->email, $mailData);
            }

            foreach ($emailAgentsB as $email) {
                $mailData = [
                    'name' => $email->name,
                    'url' => url('/score-page/' . $sub)
                ];

                $this->sendEmail($email->email, $mailData);
            }

            foreach ($emailAgentsA as $email) {
                $mailData = [
                    'name' => $email->name,
                    'url' => url('/score-page/' . $sub)
                ];

                $this->sendEmail($email->email, $mailData);
            }

            return redirect('/score-page/' . $sub)
                ->with('msg', 'You’ve added a new Property.');
        } catch (\Throwable $th) {
            return redirect('/score-page/' . $sub)
                ->with('err', 'Error! '. $th->getMessage());
        }
    }

    private function sendEmail($email, $mailData) {
        Mail::to($email)->queue(new AddNewApplicant($mailData));
    }
}

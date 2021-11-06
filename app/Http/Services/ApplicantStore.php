<?php

namespace App\Http\Services;

use App\Mail\AddNewApplicant;
use App\Mail\Contactus;
use App\Models\Applicant;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
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
            $emails = Team::whereSubjectId($sub)
                ->whereNotIn('user_email', [$user->email])
                ->select('user_email')
                ->get();

            foreach ($emails as $email) {
                $mailData = [
                    'appl_name' => $name
                ];

                $this->sendEmail($email->user_email, $mailData);
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

//        return response()->json([
//            'message' => 'Email has been sent.'
//        ], Response::HTTP_OK);

    }
}

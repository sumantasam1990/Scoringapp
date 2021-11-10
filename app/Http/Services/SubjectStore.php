<?php

namespace App\Http\Services;

use App\Models\Mainsubject;
use App\Models\Subject;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SubjectStore
{
    public function save(array $subjectt, array $mailid): void
    {
        $user = Auth::user();

        foreach ($subjectt as $submain) {

            // main subject

            $main_subject = new Mainsubject;
            $main_subject->user_id = $user->id;
            $main_subject->main_subject_name = '';
            $main_subject->save();

            // add on subject table
            $subject = new Subject;

            $subject->subject_name = $submain;
            $subject->user_id = $user->id;
            $subject->mainsubject_id = $main_subject->id;

            $subject->save();

            // again insert subject
            $userBuyer = User::where("email", $mailid)->first();

            $subject_buyer = new Subject;

            $subject_buyer->subject_name = $submain;
            $subject_buyer->user_id = $userBuyer->id;
            $subject_buyer->mainsubject_id = $main_subject->id;

            $subject_buyer->save();

            // add on Team table also
            $team = new Team;

            $team->user_id = $user->id;
            $team->user_email = $user->email;
            $team->subject_id = $subject->id; // Last inserted subject id
           // $team->mainsubject_id = $submain;
            $team->status = 1;

            $team->save();

            // Again add on Team table also
            $team = new Team;

            $team->user_id = $userBuyer->id;
            $team->user_email = $userBuyer->email;
            $team->subject_id = $subject_buyer->id; // Last inserted subject id
           // $team->mainsubject_id = $submain;
            $team->status = 1;

            $team->save();

        }
    }
}

<?php

namespace App\Http\Services;

use App\Models\Mainsubject;
use App\Models\Subject;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class SubjectStore
{
    public function save(array $subjectt): void
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

            // add on Team table also
            $team = new Team;

            $team->user_id = $user->id;
            $team->user_email = $user->email;
            $team->subject_id = $subject->id; // Last inserted subject id
           // $team->mainsubject_id = $submain;
            $team->status = 1;

            $team->save();

        }
    }
}

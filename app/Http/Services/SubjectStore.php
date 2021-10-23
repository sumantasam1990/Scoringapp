<?php

namespace App\Http\Services;

use App\Models\Subject;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class SubjectStore
{
    public function save(array $main, array $subjectt): void
    {
        $user = Auth::user();

        foreach ($main as $key => $submain) {

            // add on subject table
            $subject = new Subject;

            $subject->subject_name = $subjectt[$key];
            $subject->user_id = $user->id;
            $subject->mainsubject_id = $submain;

            $subject->save();

            // add on Team table also
            $team = new Team;

            $team->user_email = $user->email;
            $team->subject_id = $subject->id; // Last inserted subject id
            $team->mainsubject_id = $submain;
            $team->status = 1;

            $team->save();

        }
    }
}

<?php

namespace App\Http\Services;

use App\Models\Criteria;
use App\Models\Metadata;
use App\Models\Score;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoreStore
{

    private $minimum;
    private $scoreData = [];

    public function save($score_give, $appl, $sub, $crit_id, $image, $note)
    {
        try {

            $user = Auth::user();

            $scores = Score::where('user_id', '=', $user->id)
                ->where('subject_id', '=', $sub)
                ->where('applicant_id', '=', $appl)
                ->where('criteria_id', '=', $crit_id)
                ->select('id')->get();



            if(count($scores) > 0) {
               return redirect('/score-page/' . $sub)
                    ->with('err', 'You have already added score on this criteria.');

            } else {
                $score = new Score;
                $metadata = new Metadata;

                $score->user_id = $user->id;
                $score->subject_id = $sub;
                $score->applicant_id = $appl;
                $score->criteria_id = $crit_id;
                $score->score_number = $score_give;

                // get score card no
                $minimum_no = Criteria::select("priority")
                    ->where("id", "=", $crit_id)->first();

                /** @var int $minimum_no */

                if (!empty($minimum_no)) if ($minimum_no->priority == "138D07") $this->minimum = 5;
                if (!empty($minimum_no)) if ($minimum_no->priority == "40F328") $this->minimum = 4;
                if (!empty($minimum_no)) if ($minimum_no->priority == "FCD40A") $this->minimum = 3;
                if (!empty($minimum_no)) if ($minimum_no->priority == "F56A21") $this->minimum = 2;
                if (!empty($minimum_no)) if ($minimum_no->priority == "FC0A0A") $this->minimum = 1;

                $score->score_card_no = ($score_give - $this->minimum);

                $score->save();

                $metadata->meta_notes = $note; // save into metadata
                $metadata->score_id = $score->id; // last insert score id

                if (!empty($image)) {

                    //file upload

                    $imageName = 'scF_' . uniqid() . time() . '.' . $image->extension();

                    $image->move(public_path('uploads'), $imageName);

                    $metadata->meta_file = $imageName; // save into metadata

                }

                $metadata->save();

                return redirect('/score-page/' . $sub)
                    ->with('msg', 'Score has been successfully added.');
            }


        } catch (\Throwable $th) {
            return redirect('/score-page/' . $sub)
                ->with('err', 'Error!' . $th->getMessage());
        }
    }



}

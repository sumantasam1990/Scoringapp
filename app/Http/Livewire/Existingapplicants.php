<?php

namespace App\Http\Livewire;

use App\Models\Applicant;
use App\Models\Subject;
use Livewire\Component;

class Existingapplicants extends Component
{

    public $applicantsArray = [];

    public $applicant_id = '';
    public $applicantName = '';
    public $applicantEmail = '';
    public $applicantPh = '';


    public function render()
    {
        $user = \Auth::user();

        $subjectsID = Subject::whereUserId($user->id)
            ->select('id')
            ->get();

        foreach ($subjectsID as $id)
        {
            $applicants = Applicant::whereSubjectId($id->id)
                ->get();
            foreach ($applicants as $applicant)
            {
                $this->applicantsArray[] = array(
                    'name' => $applicant->name,
                    'id' => $applicant->id
                );

            }
        }

        return view('livewire.existingapplicants', ['applicantsArray' => $this->applicantsArray]);
    }

    public function changeData()
    {
        $applicant = Applicant::whereId($this->applicant_id)->first();
        $this->applicantName = $applicant->name;
        $this->applicantEmail = $applicant->email;
        $this->applicantPh = $applicant->phone;
    }


}

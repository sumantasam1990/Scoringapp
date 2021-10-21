<?php

namespace App\Http\Livewire;

use App\Models\Mainsubject;
use App\Models\Subject;
use Livewire\Component;

class Inlineedit extends Component
{
    public $subject_id;
    public $main_subject_id;
    public $subject_name;
    public $main_subject_name;
    public $edit = false;
    public $edit_main_subject = false;



    public function render()
    {
        return view('livewire.inlineedit');
    }

    public function startEdit()
    {
        if($this->edit) {
            $this->edit = false;
        } else {
            $this->edit = true;
        }
    }

    public function startEditMainSubject()
    {
        if($this->edit_main_subject) {
            $this->edit_main_subject = false;
        } else {
            $this->edit_main_subject = true;
        }
    }

    public function save()
    {
        Subject::where('id', $this->subject_id)
            ->update(['subject_name' => $this->subject_name]);

        $this->edit = false;

    }

    public function savemainsubject()
    {
        Mainsubject::where('id', $this->main_subject_id)
            ->update(['main_subject_name' => $this->main_subject_name]);

        $this->edit_main_subject = false;

    }
}

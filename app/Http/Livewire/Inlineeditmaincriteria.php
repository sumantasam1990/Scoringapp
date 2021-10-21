<?php

namespace App\Http\Livewire;

use App\Models\Maincriteria;
use Livewire\Component;

class Inlineeditmaincriteria extends Component
{

    public $criteria_name;
    public $main_criteria_id;
    public $edit = false;

    public function startEdit()
    {
        if($this->edit) {
            $this->edit = false;
        } else {
            $this->edit = true;
        }

    }

    public function render()
    {
        return view('livewire.inlineeditmaincriteria');
    }


    public function save()
    {
        Maincriteria::where('id', $this->main_criteria_id)
            ->update(['criteria_name' => $this->criteria_name]);

        $this->edit = false;

    }

}

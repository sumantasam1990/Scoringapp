<?php

namespace App\Http\Livewire;

use App\Models\Criteria;
use Livewire\Component;

class Inlineeditcriteria extends Component
{
    public $title;
    public $criteria_id;
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
        return view('livewire.inlineeditcriteria');
    }

    public function save()
    {
        Criteria::where('id', $this->criteria_id)
            ->update(['title' => $this->title]);

        $this->edit = false;

    }
}

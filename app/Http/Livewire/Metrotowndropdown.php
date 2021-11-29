<?php

namespace App\Http\Livewire;

use App\Models\Metro;
use App\Models\State;
use App\Models\Town;
use Livewire\Component;

class Metrotowndropdown extends Component
{
    public $state;
    public $metro;
    public $town;
    public $metroData = [];
    public $townData = [];

    public function render()
    {
        $states = State::all();
        return view('livewire.metrotowndropdown', ['states' => $states]);
    }

    public function changeState()
    {
        $this->metroData = Metro::where('state_id', '=', $this->state)->get();
    }

    public function changeMetro()
    {
        $this->townData = Town::where('metro_id', '=', $this->metro)->get();
    }
}

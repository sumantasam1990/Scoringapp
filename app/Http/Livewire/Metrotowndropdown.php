<?php

namespace App\Http\Livewire;

use App\Models\Metro;
use App\Models\State;
use App\Models\Town;
use Livewire\Component;

class Metrotowndropdown extends Component
{
    public $state;
    public $state_hd;
    public $metro;
    public $town;
    public $metroData = [];
    public $townData = [];
    public $loc = [];
    public $locTownName = [];

    public function render()
    {
        $states = State::all();
        return view('livewire.metrotowndropdown', ['states' => $states]);
    }

    public function changeState()
    {
        $this->metroData = Metro::where('state_id', '=', $this->state)->get();
        $this->townData = [];
        $this->state_hd = $this->state;
    }

    public function changeMetro()
    {
        $this->townData = Town::where('metro_id', '=', $this->metro)->get();
    }

    public function add_more()
    {
        if($this->town != null){
            $town_name = Town::whereId($this->town)->select('name')->first();
            array_push($this->locTownName, $town_name->name);
            array_push($this->loc, $this->town);
            $this->loc = array_unique($this->loc);
            $this->locTownName = array_unique($this->locTownName);
        }

    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Followers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Followunfollow extends Component
{
    public $follow = true;
    public $agentID;

    public function render()
    {
        $followers = Followers::where('who_follow', '=', Auth::user()->id)
            ->where('whom_follow', '=', $this->agentID)
            ->select('id')
            ->get();

        if(count($followers) > 0) {
            $this->follow = false;
        } else {
            $this->follow = true;
        }

        return view('livewire.followunfollow');
    }

    public function follow_now()
    {
        $followers = Followers::where('who_follow', '=', Auth::user()->id)
            ->where('whom_follow', '=', $this->agentID)
            ->select('id')
            ->get();

        if(count($followers) == 0) {
            $follower = new Followers;
            $follower->who_follow = Auth::user()->id;
            $follower->whom_follow = $this->agentID;
            $follower->subject_id = 0;
            $follower->save();

            $this->follow = false;
        }

    }

    public function unfollow_now()
    {
        Followers::where('who_follow', '=', Auth::user()->id)
            ->where('whom_follow', '=', $this->agentID)
            ->delete();

        $this->follow = true;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Questionnaire extends Controller
{
    public function index($id)
    {
        $title = "Questionnaire";

        $user = Auth::user();

        $data = \App\Models\Questionnaire::where('subject_id', '=', $id)
            ->paginate('10');

        return view('questionnaire.index', ['title' => $title, 'subid' => $id, 'data' => $data]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'criteria' => 'required',
            'priority' => 'required',
            'subid' => 'required:numeric'
        ]);

        $user = Auth::user();

        try {
            $questionnaire = new \App\Models\Questionnaire;
            $questionnaire->criteria_name = $request->criteria;
            $questionnaire->priority = $request->priority;
            $questionnaire->user_id = $user->id;
            $questionnaire->subject_id = $request->subid;
            $questionnaire->save();

            return back()
                ->with('msg', 'Your questionnaire has been posted successfully.');
        } catch (\Throwable $th) {
            return back()
                ->with('err', 'Error! ' . $th->getMessage());
        }

    }
}

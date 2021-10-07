<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($id)
    {
        $subject = Subject::select("id", "subject_name")
            ->where("id", "=", $id)
            ->first();

        $teams = DB::table('teams')
            ->leftJoin('users', "users.id", "=", "teams.user_id")
            ->select('users.name', 'teams.created_at')
            ->where('teams.subject_id', '=', $id)->get();

        $messages = DB::table('messages')
            ->join("users", "users.id", "=", "messages.user_id")
            ->where("messages.subject_id", "=", $id)
            ->select('messages.message_txt', 'messages.id', 'messages.user_id', 'messages.created_at', 'users.name')
            ->get();

        // writing algorithm for reply messsage

        foreach ($messages as $msg) {
            DB::table('replies')
                ->join('messages', 'replies.message_id', '=', 'messages.id')
                ->join('users', 'users.id', '=', 'replies.user_id')
                ->where('replies.subject_id', '=', $id)
                ->where()
                ->get();
        }

        return view('message.index', ['title' => 'Message Room', 'subject' => $subject, 'teams' => $teams, 'messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

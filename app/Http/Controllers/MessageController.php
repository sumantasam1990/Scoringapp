<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Reply;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// for mail send
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMessage;
use Symfony\Component\HttpFoundation\Response;


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
            ->orderBy('messages.id', 'desc')
            ->get();


        return view('message.index', ['title' => 'Message Room', 'subject' => $subject, 'teams' => $teams, 'messages' => $messages]);
    }

    public function reply(Request $request) {
        $request->validate([
            'msg_id' => 'required',
            'sub_id' => 'required',
            'reply_msg' => 'required'
        ]);

        $user = Auth::user();

        $reply = new Reply;

        $reply->message_id = $request->msg_id;
        $reply->subject_id = $request->sub_id;
        $reply->reply_txt = $request->reply_msg;
        $reply->user_id = $user->id;

        $reply->save();

        //send email
        $message_user_email = DB::table('messages')
            ->join('users', 'users.id', '=', 'messages.user_id')
            ->where('messages.id', '=', $request->msg_id)
            ->select('users.email', 'users.name')
            ->first();

        $mailArray = [
            'name' => $message_user_email->name,
            'url' => url('/message-room/' . $request->sub_id)
        ];

        $this->sendEmail($message_user_email->email, $mailArray);

        return back()
            ->with('msg', "Your reply has been successfully added.");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'sub_idd' => 'required',
            'msg_txt' => 'required'
        ]);

        $user = Auth::user();

        $create = new Message;

        $create->subject_id = $request->sub_idd;
        $create->message_txt = $request->msg_txt;
        $create->user_id = $user->id;

        $create->save();

        return back()
            ->with('msg', "Your new message has been successfully added.");
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

    private function sendEmail($email, $mailData) {

        Mail::to($email)->send(new SendMessage($mailData));

        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }

}

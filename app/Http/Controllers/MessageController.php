<?php

namespace App\Http\Controllers;

use App\Models\Mainsubject;
use App\Models\Message;
use App\Models\Reply;
use App\Models\Room;
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
    public function index($id, $roomid)
    {
        $subject = Subject::select("id", "subject_name", "user_id")
            ->where("id", "=", $id)
            ->first();



        $roomname = Room::select('room_name')
            ->where('id', '=', $roomid)
            ->first();

        $teams = DB::table('teams')
            ->leftJoin('users', "users.email", "=", "teams.user_email")
            ->select('users.name', 'teams.created_at')
            ->where('teams.subject_id', '=', $id)->get();

        $messages = DB::table('messages')
            ->join("users", "users.id", "=", "messages.user_id")
            ->where("messages.subject_id", "=", $id)
            ->where('messages.room_id', '=', $roomid)
            ->select('messages.message_txt', 'messages.id', 'messages.user_id', 'messages.created_at', 'users.name')
            ->orderBy('messages.id', 'desc')
            ->get();


        return view('message.index', ['title' => 'Message Room', 'subject' => $subject, 'teams' => $teams, 'messages' => $messages, 'roomid' => $roomid, 'roomname' => $roomname]);
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
            'url' => url('/message-room/' . $request->sub_id . '/' . $request->msg_id)
        ];

        //$this->sendEmail($message_user_email->email, $mailArray);

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
            'msg_txt' => 'required',
            'room_id' => 'required'
        ]);

        $user = Auth::user();

        $create = new Message;

        $create->subject_id = $request->sub_idd;
        $create->message_txt = $request->msg_txt;
        $create->room_id = $request->room_id;
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
        $request->validate([
            'hd_sub_id' => 'required',
            'room_name' => 'required'
        ]);

        try {
            $room = new Room;

            $room->subject_id = $request->hd_sub_id;
            $room->room_name = $request->room_name;

            $room->save();

            return back()
                ->with('msg', "Your Room has been successfully created.");
        } catch (\Throwable $th) {
            return back()
                ->with('err', "Error! Something is wrong try again later.");
        }
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

        Mail::to($email)->queue(new SendMessage($mailData));

        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }

    public function message_rooms($id) {

        $subject = Subject::where('id', '=', $id)
            ->first();

        $mainsubject = Mainsubject::where('id', '=', $subject->mainsubject_id)
            ->select('main_subject_name')->first();

        $rooms = Room::where('subject_id', '=', $id)
            ->get();

        return view('message.rooms',
            ['title' => 'Message Room List', 'rooms' => $rooms,
                'subject' => $subject, 'mainsubject' => $mainsubject]);
    }

}

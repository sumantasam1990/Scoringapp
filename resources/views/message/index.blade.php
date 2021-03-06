@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mb-4">
            <h2 class="display-6 text-left heading_txt">Message Room</h2>

            <h5 style="margin-top: -5px;" class="display-7 text-left heading_txt">{{ $subject->subject_name }}</h5>
            <h5 style="margin-top: -5px;" class="display-7 text-left heading_txt">{{ $roomname->room_name }}</h5>

            <hr />
            <h2 class="display-6 text-left heading_txt mt-4">People</h2>
            <hr />

            <div class="row">
                @if(count($teams) > 0)

                    @if(count($agentA) > 0 || auth()->user()->user_type == 'Buyer')
                    @foreach($teams as $team)
                        <div class="col-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-xs-6 mt-3">
                            <div class="member-box text-center">
                                <img src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" style="object-fit: cover; width: 100%; height: 120px;">
                                <p class="fw-bold">{{ $team->name }}</p>
                                {{-- <small>Added <span>{{ date('F jS, y', strtotime($team->created_at)) }}</span></small> --}}
                            </div>

                        </div>
                    @endforeach
                    @endif
                        @if(auth()->user()->user_type == 'Agent')
                        @foreach($followers as $follower)
                            <div class="col-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-xs-6 mt-3">
                                <div class="member-box text-center">
                                    <img src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" style="object-fit: cover; width: 100%; height: 120px;">
                                    <p class="fw-bold">{{ $follower->name }}</p>
                                    {{-- <small>Added <span>{{ date('F jS, y', strtotime($team->created_at)) }}</span></small> --}}
                                </div>

                            </div>
                        @endforeach
                        @endif
                        <div class="col-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-xs-6 mt-3">
                            <div class="member-box text-center">
                                <img src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" style="object-fit: cover; width: 100%; height: 120px;">
                                <p class="fw-bold">{{ $subject->user->name }}</p>
                                {{-- <small>Added <span>{{ date('F jS, y', strtotime($team->created_at)) }}</span></small> --}}
                            </div>

                        </div>
                @else
                    <p>You don't have any invited members.</p>
                @endif
            </div>

            <div @class('row mt-4')>
                <div @class('col-md-6')>
                    <h2 class="display-6 text-left heading_txt">The Messages</h2>
                </div>
                <div @class('col-md-6')>
                    <a @class('btn btn-success btn-sm') style="float: right;" href="#create_msg_nav">Create A Message</a>
                </div>
            </div>
            <hr />

            <div class="row">
                @foreach($messages as $message)

                    @role('buyer')
                    @php
                        $agent_am = \App\Models\Subject::where('id', '=', $subject->id)
                                    ->where('user_id', '=', $message->id)
                                    ->select('user_id')
                                    ->get();

                    @endphp
                    @if(count($agent_am) > 0 || $message->user_type == 'Buyer')

                <div class="col-12 mt-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4 class="fs-6 fw-bold">{{ $message->name }}</h4>

                            {{ $message->message_txt }}
                            <p class="text-black-50"><small>{{ date('F jS, Y', strtotime($message->created_at)) }}</small></p>
                        </div>
                    </div>
                    @php
                        $replies = DB::table('replies')
                                  ->join('messages', 'replies.message_id', '=', 'messages.id')
                                  ->join('users', 'users.id', '=', 'replies.user_id')
                                  ->where('replies.subject_id', '=', $subject->id)
                                  ->where('replies.message_id', '=', $message->mid)
                                  ->select('replies.reply_txt', 'users.name', 'users.id', 'users.email', 'users.user_type', 'replies.created_at')
                                  ->get();

                    //dd($replies);
                    @endphp
                    @foreach($replies as $reply)
                        @php
                            $agent_amr = \App\Models\Subject::where('id', '=', $subject->id)
                                    ->where('user_id', '=', $reply->id)
                                    ->select('user_id')
                                    ->get();

                        @endphp
                        @if(count($agent_amr) > 0 || $reply->user_type == 'Buyer')
                    <div class="row">
                        <div class="col-1"></div>

                        <div class="col-10 reply">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="fs-6 fw-bold">{{ $reply->name }}</h4>
                                    {{ $reply->reply_txt }}
                                    <p class="text-black-50"><small>{{ date('F jS, Y @ h:i A', strtotime($reply->created_at)) }}</small></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-1"></div>
                    </div>
                        @endif
                    @endforeach


                    <div @class('row')>
                        <div @class('col-1')></div>
                        <div @class('col-10')>
                            <form action="{{ route('reply') }}" method="post"@class('d-inline')>
                                @csrf
                                <input type="hidden" name="msg_id" value="{{ $message->mid }}" required>
                                <input type="hidden" name="sub_id" value="{{ $subject->id }}" required>

                                <div class="row">
                                    <div class="col-8">
                                        <input required type="text" name="reply_msg" class="form-control" placeholder="Write your reply...">
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" @class('btn btn-dark btn-sm')>Reply</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div @class('col-1')></div>
                    </div>
                </div>
                @endif

                    @endrole

{{--                Agent B--}}
                    @unlessrole('buyer')
                    @if(count($agentA) == 0)
                    @php
                        $agent_am = \App\Models\Subject::where('id', '=', $subject->id)
                                    ->where('user_id', '=', $message->id)
                                    ->select('user_id')
                                    ->get();

                    @endphp
                    @if(count($agent_am) > 0 || $message->user_type == 'Agent')

                        <div class="col-12 mt-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="fs-6 fw-bold">{{ $message->name }}</h4>

                                    {{ $message->message_txt }}
                                    <p class="text-black-50"><small>{{ date('F jS, Y', strtotime($message->created_at)) }}</small></p>
                                </div>
                            </div>
                            @php
                                $replies = DB::table('replies')
                                          ->join('messages', 'replies.message_id', '=', 'messages.id')
                                          ->join('users', 'users.id', '=', 'replies.user_id')
                                          ->where('replies.subject_id', '=', $subject->id)
                                          ->where('replies.message_id', '=', $message->mid)
                                          ->select('replies.reply_txt', 'users.name', 'users.id', 'users.email', 'users.user_type', 'replies.created_at')
                                          ->get();

                            //dd($replies);
                            @endphp
                            @foreach($replies as $reply)
                                @php
                                    $agent_amr = \App\Models\Subject::where('id', '=', $subject->id)
                                            ->where('user_id', '=', $reply->id)
                                            ->select('user_id')
                                            ->get();

                                @endphp
                                @if(count($agent_amr) > 0 || $reply->user_type == 'Agent')
                                    <div class="row">
                                        <div class="col-1"></div>

                                        <div class="col-10 reply">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h4 class="fs-6 fw-bold">{{ $reply->name }}</h4>
                                                    {{ $reply->reply_txt }}
                                                    <p class="text-black-50"><small>{{ date('F jS, Y @ h:i A', strtotime($reply->created_at)) }}</small></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-1"></div>
                                    </div>
                                @endif
                            @endforeach


                            <div @class('row')>
                                <div @class('col-1')></div>
                                <div @class('col-10')>
                                    <form action="{{ route('reply') }}" method="post"@class('d-inline')>
                                        @csrf
                                        <input type="hidden" name="msg_id" value="{{ $message->mid }}" required>
                                        <input type="hidden" name="sub_id" value="{{ $subject->id }}" required>

                                        <div class="row">
                                            <div class="col-8">
                                                <input required type="text" name="reply_msg" class="form-control" placeholder="Write your reply...">
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" @class('btn btn-dark btn-sm')>Reply</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div @class('col-1')></div>
                            </div>
                        </div>
                    @endif
                    @endif
                    @endunlessrole

                    {{--                Agent A--}}
                    @unlessrole('buyer')
                    @if(count($agentA) > 0)



                            <div class="col-12 mt-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="fs-6 fw-bold">{{ $message->name }}</h4>

                                        {{ $message->message_txt }}
                                        <p class="text-black-50"><small>{{ date('F jS, Y', strtotime($message->created_at)) }}</small></p>
                                    </div>
                                </div>
                                @php
                                    $replies = DB::table('replies')
                                              ->join('messages', 'replies.message_id', '=', 'messages.id')
                                              ->join('users', 'users.id', '=', 'replies.user_id')
                                              ->where('replies.subject_id', '=', $subject->id)
                                              ->where('replies.message_id', '=', $message->mid)
                                              ->select('replies.reply_txt', 'users.name', 'users.id', 'users.email', 'users.user_type', 'replies.created_at')
                                              ->get();

                                //dd($replies);
                                @endphp
                                @foreach($replies as $reply)

                                        <div class="row">
                                            <div class="col-1"></div>

                                            <div class="col-10 reply">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h4 class="fs-6 fw-bold">{{ $reply->name }}</h4>
                                                        {{ $reply->reply_txt }}
                                                        <p class="text-black-50"><small>{{ date('F jS, Y @ h:i A', strtotime($reply->created_at)) }}</small></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-1"></div>
                                        </div>

                                @endforeach


                                <div @class('row')>
                                    <div @class('col-1')></div>
                                    <div @class('col-10')>
                                        <form action="{{ route('reply') }}" method="post"@class('d-inline')>
                                            @csrf
                                            <input type="hidden" name="msg_id" value="{{ $message->mid }}" required>
                                            <input type="hidden" name="sub_id" value="{{ $subject->id }}" required>

                                            <div class="row">
                                                <div class="col-8">
                                                    <input required type="text" name="reply_msg" class="form-control" placeholder="Write your reply...">
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" @class('btn btn-dark btn-sm')>Reply</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div @class('col-1')></div>
                                </div>
                            </div>
                        @endif

                    @endunlessrole

{{--                Agent B--}}
{{--                    @unlessrole('buyer')--}}
{{--                    @php--}}
{{--                        $agent_am = \App\Models\Subject::where('id', '=', $subject->id)--}}
{{--                                    ->where('user_id', '=', $message->id)--}}
{{--                                    ->select('user_id')--}}
{{--                                    ->get();--}}

{{--                    @endphp--}}

{{--                    @if(count($agent_am) == 0 && $message->user_type == 'Agent')--}}

{{--                    <div class="col-12 mt-4">--}}
{{--                        <div class="d-flex">--}}
{{--                            <div class="flex-shrink-0">--}}
{{--                                <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">--}}
{{--                            </div>--}}
{{--                            <div class="flex-grow-1 ms-3">--}}
{{--                                <h4 class="fs-6 fw-bold">{{ $message->name }}</h4>--}}
{{--                                {{ $message->message_txt }}--}}
{{--                                <p class="text-black-50"><small>{{ date('F jS, Y', strtotime($message->created_at)) }}</small></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @php--}}
{{--                            $replies = DB::table('replies')--}}
{{--                                  ->join('messages', 'replies.message_id', '=', 'messages.id')--}}
{{--                                  ->join('users', 'users.id', '=', 'replies.user_id')--}}
{{--                                  ->where('replies.subject_id', '=', $subject->id)--}}
{{--                                  ->where('replies.message_id', '=', $message->mid)--}}
{{--                                  ->select('replies.reply_txt', 'users.name', 'users.id', 'users.email', 'users.user_type', 'replies.created_at')--}}
{{--                                  ->get();--}}
{{--                        @endphp--}}
{{--                        @foreach($replies as $reply)--}}
{{--                            @php--}}
{{--                                $agent_amr = \App\Models\Subject::where('id', '=', $subject->id)--}}
{{--                                        ->where('user_id', '=', $reply->id)--}}
{{--                                        ->select('user_id')--}}
{{--                                        ->get();--}}

{{--                            @endphp--}}
{{--                            @if(count($agent_amr) == 0 && $reply->user_type == 'Agent')--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-1"></div>--}}

{{--                                <div class="col-10 reply">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1 ms-3">--}}
{{--                                            <h4 class="fs-6 fw-bold">{{ $reply->name }}</h4>--}}
{{--                                            {{ $reply->reply_txt }}--}}
{{--                                            <p class="text-black-50"><small>{{ date('F jS, Y @ h:i A', strtotime($reply->created_at)) }}</small></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-1"></div>--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}

{{--                        <div @class('row')>--}}
{{--                            <div @class('col-1')></div>--}}
{{--                            <div @class('col-10')>--}}
{{--                                <form action="{{ route('reply') }}" method="post"@class('d-inline')>--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="msg_id" value="{{ $message->mid }}" required>--}}
{{--                                    <input type="hidden" name="sub_id" value="{{ $subject->id }}" required>--}}

{{--                                    <div class="row">--}}
{{--                                        <div class="col-8">--}}
{{--                                            <input required type="text" name="reply_msg" class="form-control" placeholder="Write your reply...">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-4">--}}
{{--                                            <button type="submit" @class('btn btn-dark btn-sm')>Reply</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <div @class('col-1')></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    @endif--}}
{{--                    @endunlessrole--}}




                @endforeach

            </div>

            <div id="create_msg_nav" class="row mt-6 border-top p-4">
                <div class="col-8 mx-auto">
                    <h4>Post A Message</h4>
                    <form action="{{ route('create') }}" method="post"@class('d-inline')>
                        @csrf
                        <input type="hidden" name="sub_idd" value="{{ $subject->id }}" required>
                        <input type="hidden" name="room_id" value="{{ $roomid }}" required>

                        <textarea required rows="4" name="msg_txt" class="form-control" placeholder="Write your message..."></textarea>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                            <button type="submit" class="btn btn-dark">Post</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

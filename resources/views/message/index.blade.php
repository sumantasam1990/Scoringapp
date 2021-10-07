@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mb-4">
            <h2 class="display-6 text-left heading_txt">Message Room</h2>
            <h5 style="margin-top: -5px;" class="display-7 text-left heading_txt">{{ $subject->subject_name }}</h5>
            <hr />
            <h2 class="display-6 text-left heading_txt mt-4">Team Members</h2>
            <hr />

            <div class="row">
                @if(count($teams) > 0)
                    @foreach($teams as $team)
                        <div class="col-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-xs-6">
                            <div class="member-box text-center">
                                <img src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" style="object-fit: cover; width: 100%; height: 120px;">
                                <p class="fw-bold">{{ $team->name }}</p>
                                <small>Added <span>{{ date('F jS, y', strtotime($team->created_at)) }}</span></small>
                            </div>

                        </div>
                    @endforeach
                @else
                    <p>You don't have any invited members.</p>
                @endif
            </div>

            <h2 class="display-6 text-left heading_txt mt-4">The Messages</h2>
            <hr />

            <div class="row">
                @foreach($messages as $message)
                <div class="col-12">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4 class="fs-6 fw-bold">{{ $message->name }}</h4>
                            {{ $message->message_txt }}
                            <p class="text-black-50"><small>{{ date('F jS, Y @ h:i A', strtotime($message->created_at)) }}</small></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10 reply">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img class="img-thumbnail" style="object-fit: cover; width: 50px; height: 50px;" src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" alt="profile">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="fs-6 fw-bold">{{ $message->name }}</h4>
                                    {{ $message->message_txt }}
                                    <p class="text-black-50"><small>March 21</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

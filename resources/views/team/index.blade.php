@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mb-4">
            <h2 class="display-4 text-left heading_txt">
                @hasrole('buyer')
                    Invite Buyer Page
                @else
                    Invite Agent Page
                @endhasrole

                <i
                    style="text-align: center !important; font-size: 14px;"
                    data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="This is how a buyer’s agents can invite listing agents to join their Score Pages and add properties for their buyers to add scores to. " class="fas fa-info-circle"></i>

            </h2>
            <h5 style="margin-top: -5px;" class="display-7 text-left heading_txt">{{ $subject->subject_name }}</h5>
            <h2 class="display-4 text-left heading_txt mt-4">
                @hasrole('buyer')
                    Buyers
                @else
                    Agents
                @endhasrole
            </h2>
            <hr />

            <div class="row">
                @if(count($teams) > 0)
                @foreach($teams as $team)
                <div class="col-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-6 col-xs-6">
                    <div class="member-box text-center">
                        <img src="{{ asset('images/user.svg') }}" style="object-fit: cover; width: 100%; height: 120px;">
                        <p class="fw-bold" style="word-break: break-all;">{{ $team->name ?? $team->user_email }}</p>

{{--                        @if($team->status == 1)--}}
{{--                        <p class="fw-bold text-success">--}}
{{--                            Accepted--}}
{{--                        </p>--}}
{{--                        @elseif($team->status == 0)--}}
{{--                            <p class="fw-bold text-warning">--}}
{{--                            Pending--}}
{{--                            </p>--}}
{{--                            @else--}}
{{--                            <p class="fw-bold text-danger">--}}
{{--                                Rejected--}}
{{--                            </p>--}}
{{--                        @endif--}}
{{--                        <p class="fs-6 text-danger">--}}
{{--                        <form action="" method="delete">--}}
{{--                            <input type="hidden" value="{{ $team->id }}">--}}
{{--                            <button type="submit" @class('btn')><i class="fas fa-trash"></i></button>--}}
{{--                        </form>--}}
{{--                        </p>--}}
                    </div>

                </div>
                @endforeach
                @else
                    <p>You don't have any invited agents.</p>
                @endif
            </div>

            <h2 class="display-4 text-left heading_txt mt-4">
                @hasrole('buyer')
                    Invite Buyer
                @else
                    Invite Agent
                @endhasrole

            </h2>
            <hr />

            <form action="{{ route('team.store') }}" method="POST" class="mt-4">
                @csrf

                @hasrole('buyer')
                    <input type="hidden" name="user_type" value="Buyer">
                @else
                    <input type="hidden" name="user_type" value="Agent">
                @endhasrole
                <input type="hidden" name="hd_sub" value="{{ $subject->id }}">
                <div class="form-group mb-4">
                    <input type="text" name="t_email" class="form-control @error('t_email') is-invalid @enderror" placeholder="Email">
                    @error('t_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <input type="text" name="t_name" class="form-control @error('t_name') is-invalid @enderror" placeholder="Full Name">
                    @error('t_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group mb-3">
                    <select class="form-control" name="" multiple style="height: 150px;">
                        <option disabled selected value="">Invite To All Existing Subjects </option>
                    </select>
                </div> --}}
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-dark btn-sm">
                        @hasrole('buyer')
                        Send Invitation
                        @else
                            Send Invitation
                        @endhasrole

                    </button>
                </div>
            </form>







            <p>&nbsp;</p>

        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

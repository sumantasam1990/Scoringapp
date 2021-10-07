@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mb-4">
            <h2 class="display-4 text-left heading_txt">Invite Team Members</h2>
            <h5 style="margin-top: -5px;" class="display-7 text-left heading_txt">{{ $subject->subject_name }}</h5>
            <h2 class="display-4 text-left heading_txt mt-4">Team Members</h2>
            <hr />

            <div class="row">
                @if(count($teams) > 0)
                @foreach($teams as $team)
                <div class="col-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 col-sm-6 col-xs-6">
                    <div class="member-box text-center">
                        <img src="https://datingshortcut.com/wp-content/themes/datingshortcut/images/user.svg" style="object-fit: cover; width: 100%; height: 120px;">
                        <p class="fw-bold">{{ $team->name }}</p>
                    </div>

                </div>
                @endforeach
                @else
                    <p>You don't have any invited members.</p>
                @endif
            </div>

            <h2 class="display-4 text-left heading_txt mt-4">Invite Team Members</h2>
            <hr />

            <form action="{{ route('team.store') }}" method="POST" class="mt-4">
                @csrf

                <input type="hidden" name="hd_sub" value="{{ $subject->id }}">
                <div class="form-group mb-4">
                    <input type="text" name="t_email" class="form-control @error('t_email') is-invalid @enderror" placeholder="Team Member's Email">
                    @error('t_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <input type="text" name="t_name" class="form-control @error('t_name') is-invalid @enderror" placeholder="Team Member's Full Name">
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
                    <button type="submit" class="btn btn-dark btn-sm">Add Team Member</button>
                </div>
            </form>







            <p>&nbsp;</p>

        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div class="">
            <h2 class="display-4 text-left heading_txt">{{ $user->name }}</h2>
            <h5 style="margin-top: -5px;" class="display-7 text-left heading_txt">Dashboard</h5>

            <div class="mt-3">
                <a class="btn btn-success btn-sm" href="/create-subject">Add Subject</a>
                <a class="btn btn-success btn-sm" href="/create-criteria">Add Criteria</a>
                <a class="btn btn-success btn-sm" href="/create-applicant">Add Applicant</a>
            </div>

            <div class="row mt-6">
                <h4>Subjects</h4>
                @foreach ($subjects as $subject)
                    <div class="col-4 mt-3">
                        <div class="card text-dark border-success" style="border: 6px solid #000 !important;">
                            <div class="card-body text-center">
                              <h5 class="card-title fw-bold mb-4" style="font-size: 22px;">{{ $subject->subject_name }}</h5>
                              {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                              <a href="/create-scoring-sheet/{{$subject->id}}" class="btn btn-dark btn-sm">Create Score Page</a>
                            </div>
                          </div>
                    </div>
                @endforeach
            </div>


            </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

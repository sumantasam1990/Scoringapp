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

            </div>



            <div class="row mt-6">

                @foreach ($mysubjects as $inv)
                    <h6 class="fw-bold" style="color: green; font-size: 26px;">{{ $inv->main_subject_name }}</h6>
                    @php
                        $invited = DB::select('select subjects.subject_name, subjects.id from subjects left join teams on (teams.subject_id=subjects.id) where teams.user_id = ? and teams.mainsubject_id = ?', [$user->id, $inv->id]);
                    @endphp
                    @foreach ($invited as $in)
                        <div class="col-12 col-xl-4 col-md-4 col-xxl-4 col-sm-12 col-xs-12 mt-3 mb-4">
                            <div class="card text-dark border-success" style="border: 6px solid green !important;">
                                <div class="card-body text-center">
                                <h4 class="card-title fw-bold mb-4 text-success" style="font-size: 22px;">{{ $in->subject_name }}</h4>
                                {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                                <a href="/create-scoring-sheet/{{$in->id}}" class="btn btn-success btn-sm">Create/Add Score</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endforeach





            </div>


            </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

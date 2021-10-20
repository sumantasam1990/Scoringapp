@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div class="">
            <h2 class="display-4 text-left heading_txt">{{ $user->name }}</h2>
            <h5 style="margin-top: -5px;" class="text-dark">See all of your Main and Sub Subjects in one simple dashboard. Open each Subject to access it's Score Page and the numerous features associated with it.
            </h5>

            <div class="mt-3 ">
                <a class="btn btn-success btn-sm" href="/create-subject">Add Subject &nbsp;

                    <i class="fas fa-info-circle" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Subjects are a way to organize where Applicants will be added within your Scorng account. A Subject is broken into two parts, a Main Subject and a Sub Subject. For example, the Main Subject can be something like the store or location where the new Applicant for which you’re hiring, will be working. For example the Sub Subject can be the actual position for which you’re hiring. "></i>



                </a>

            </div>



            <div class="row mt-6 border-top border-2 border-dark p-2">
                @php $i = 1 @endphp
                @foreach ($mysubjects as $inv)
                    <h6 class="fw-bold @if($i > 1) mt-6 border-top border-2 border-dark @endif p-4" style="color: green; font-size: 26px;">{{ $inv->main_subject_name }}</h6>
                    @php
                        $invited = DB::select('select subjects.subject_name, subjects.id from subjects left join teams on (teams.subject_id=subjects.id) where teams.user_id = ? and teams.mainsubject_id = ?', [$user->id, $inv->id]);
                    @endphp
                    @foreach ($invited as $in)
                        <div class="col-12 col-xl-4 col-md-4 col-xxl-4 col-sm-12 col-xs-12 mt-3 mb-4">
                            <div class="card text-dark border-success" style="border: 6px solid green !important;">
                                <div class="card-body text-center">
                                <h4 class="card-title fw-bold mb-2" style="font-size: 22px; color: green;">{{ $in->subject_name }}</h4>
                                {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                                <a href="/score-page/{{$in->id}}" class="btn btn-success btn-sm">Score Page</a>
                                    <br><button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Subjects are a way to organize where Applicants will be added within your Scorng account. A Subject is broken into two parts, a Main Subject and a Sub Subject. For example, the Main Subject can be something like the store or location where the new Applicant for which you’re hiring, will be working. For example the Sub Subject can be the actual position for which you’re hiring.
">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @php $i++ @endphp
                @endforeach





            </div>


            </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

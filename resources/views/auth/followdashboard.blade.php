<div class="row">

{{--    <p class="fw-bold fs-4">--}}
{{--        My Follower's Buyers--}}

{{--    </p>--}}
        @foreach ($otherSubjects as $in)
        <div class="col-12 col-xl-4 col-md-4 col-xxl-4 col-sm-12 col-xs-12 mt-3 mb-4">
            <div class="card text-dark border-success" style="border: 6px solid green !important;">
                <div class="card-body text-center">
                    <p class="text-black-50 fs-6 font-italic text-capitalize fw-bold">(Agent)</p>
                    <p class="card-title fw-bold mb-2" style="font-size: 22px; color: green;">
                        {{ $in->subject_name }}

                    </p>
                    @if(count($agentB) == 0)
                        <h4 class="card-title fw-bold mb-2" style="font-size: 22px; color: green;">{{ $in->subject_name }}</h4>
                    @endif


                <a href="/score-page/{{$in->id}}" class="btn btn-success btn-sm">Score Page</a>


                    <br><button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Subjects are a way to organize where Applicants will be added within your Scorng account. A Subject is broken into two parts, a Main Subject and a Sub Subject. For example, the Main Subject can be something like the store or location where the new Applicant for which you’re hiring, will be working. For example the Sub Subject can be the actual position for which you’re hiring.
">
                        <i class="fas fa-info-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    @endforeach

</div>

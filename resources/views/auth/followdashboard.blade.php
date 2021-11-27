<div class="row">

    @php
    $agentAs = \Illuminate\Support\Facades\DB::table('followers')
                ->join('users', 'users.id', '=', 'followers.whom_follow')
                ->where('followers.who_follow', '=', auth()->user()->id)
                ->select('users.name', 'users.id')
                ->get();
    @endphp

    @foreach($agentAs as $agent_a)
        <p class="fw-bold fs-4">{{ $agent_a->name }}'s Buyers</p>

    @php
        $otherSubjects = DB::table('subjects')
                        ->join('followers', 'subjects.user_id', '=', 'followers.whom_follow')
                        ->join('users', 'users.id', '=', 'subjects.user_id')
                        ->where('followers.who_follow', '=', auth()->user()->id)
                        ->where('followers.whom_follow', '=', $agent_a->id)
                        ->select('subjects.*', 'users.name', 'followers.whom_follow')
                        ->get();
    @endphp

        @foreach ($otherSubjects as $in)
        <div class="col-12 col-xl-4 col-md-4 col-xxl-4 col-sm-12 col-xs-12 mt-3 mb-4">
            <div class="card text-dark border-success" style="border: 6px solid green !important;">
                <div class="card-body text-center">
{{--                    <p class="text-black-50 fs-6 font-italic text-capitalize fw-bold">(Agent)</p>--}}
                    <p class="card-title fw-bold mb-2" style="font-size: 22px; color: green;">
{{--                        {{ $in->subject_name }}--}}

                    </p>
                    @if(count($agentB) == 0)
                        <h4 class="card-title fw-bold mb-2" style="font-size: 22px; color: green;">{{ $in->subject_name }}</h4>
                    @endif


                <a href="/score-page/{{$in->id}}" class="btn btn-success btn-sm">Score Page</a>


                    <br><button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Score Page allows buyers to add scores to each individual criteria for a particular property that they’ve viewed online so that agents can get a sense of what the buyer likes and doesn’t like when it comes to houses. Agents and buyers can then see a comprehensive, detailed and objective overview of the feedback not only on each property but each individual aspect for each property.

">
                        <i class="fas fa-info-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
    @endforeach

</div>

@include('layouts.header', ['title' => $title])

<div class="container mt-4">

    @include('layouts.alert')



    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">

            <h2 class="display-4 text-left heading_txt">{{ $town->name }}</h2>

            <div class="row mt-6">

                @foreach($agents as $agent)
                    <div class="row">
                        <div class="col-8 fw-bold fs-4">{{ $agent->name }} </div>
                        <div class="col-4"><a class="ml-5 btn btn-dark btn-sm" href="">Follow</a> </div>
                    </div>


                    @php
                        $otherSubjects = \App\Models\Subject::whereUserId($agent->id)->select('subject_name', 'id')->get();
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

        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

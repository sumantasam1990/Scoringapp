@include('layouts.header', ['title' => $title])

<div class="container-fluid mt-6">

    @include('layouts.alert')


    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div class="text-center">
                <h2 class="display-4 text-center heading_txt">Scorecard</h2>

                <table class="table mt-6 scorecard-header-table">
                    <tr>
                        <th>{{ $applicants->name }}</th>
                        <th>{{ $applicants->total }} Total Score </th>
                        <th><a class="btn btn-success btn-sm" href="/applicant/{{ $applicants->id }}/{{ $subject->id }}">Open Applicant Profile</a> </th>
                    </tr>
                </table>

{{--                Main score board to display here--}}

                <table class="table scorecard-table">
                    @foreach($scorecards as $scorecard)
                    <tr>
                        <th>
                            @if($scorecard->criteria_priority == '138D07')
                                {{ $scorecard->score_number - 5 }}
                                @elseif($scorecard->criteria_priority == '40F328,138D07')
                                    {{ $scorecard->score_number - 9 }}
                                @elseif($scorecard->criteria_priority == 'FCD40A,40F328')
                                    {{ $scorecard->score_number - 7 }}
                                @elseif($scorecard->criteria_priority == 'FCD40A')
                                    {{ $scorecard->score_number - 3 }}
                                @elseif($scorecard->criteria_priority == 'F56A21')
                                    {{ $scorecard->score_number - 2 }}
                                @elseif($scorecard->criteria_priority == 'FCD40A,F56A21')
                                    {{ $scorecard->score_number - 5 }}
                                @elseif($scorecard->criteria_priority == 'F56A21,FC0A0A')
                                    {{ $scorecard->score_number - 3 }}
                                @elseif($scorecard->criteria_priority == 'FC0A0A')
                                    {{ $scorecard->score_number - 1 }}

                            @endif
                        </th>
                        <th>
                            @if($scorecard->criteria_priority == '138D07')
                                5
                                @elseif($scorecard->criteria_priority == '40F328,138D07')
                                9
                                @elseif($scorecard->criteria_priority == 'FCD40A,40F328')
                                7
                                @elseif($scorecard->criteria_priority == 'FCD40A')
                                3
                                @elseif($scorecard->criteria_priority == 'F56A21')
                                2
                                @elseif($scorecard->criteria_priority == 'FCD40A,F56A21')
                                5
                                @elseif($scorecard->criteria_priority == 'F56A21,FC0A0A')
                                3
                                @elseif($scorecard->criteria_priority == 'FC0A0A')
                                1
                            @endif
                        </th>
                        <th>
                            <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>
                            @php
                                $exp = explode(",", $scorecard->criteria_priority);
                            @endphp
                            @foreach ($exp as $e)
                                @if (count($exp) > 1)
                                    @php
                                        $width = "45%";
                                    @endphp

                                @else
                                    @php
                                        $width = "100%";
                                    @endphp

                                @endif
                                <p class="btn score-priority"
                                       style="background-color: #{{ $e }}; border: 3px solid #{{ $e }}; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px;"></p>

                            @endforeach
                        </th>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>

@include('layouts.footer')

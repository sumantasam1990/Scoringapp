@include('layouts.header', ['title' => $title])

<div class="container-fluid mt-6">

    @include('layouts.alert')


    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div class="text-center">
                <h2 class="display-4 text-center heading_txt">Scoreboard

                    <i
                        style="text-align: center !important; font-size: 14px;"
                        data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top" data-bs-content="This is the most important feature of Scorng. The Scoreboard allows you to see and measure how well an Applicant did based on how many times they received a particular score based on the following 7 scores below. <br><br>

These numbers are only based on the scores given by the Main Team Member. The second column allows you to see how many times this particular applicant received one of these 7 scores. The third column allows you to see the actual criteria that the Applicant has received the score for.<br><br>

<p>Greatly Exceeded Expectations </p>
<p>Exceeded Expectations </p>
<p>Slightly Exceeded Expectations </p>
<p>Met Expectations </p>
<p>Slightly Failed Expectations </p>
<p>Failed Expectations </p>
<p>Greatly Failed Expectations</p>" class="fas fa-info-circle"></i>

                </h2>



                <table class="table mt-6 scorecard-header-table table-bordered">
                    <tr style="border: none">
                        <th colspan="4" style="border: none !important;">
                            @php
                                $chkfinalist = DB::select("select count(*) as total from finalists where subject_id = ? and applicant_id = ?", [$subject->id, $applicants->id]);
                            @endphp
                            @if ($chkfinalist[0]->total == 0)
                            <form onsubmit="return confirm('Are you sure?')" action="{{ route("finalist.store") }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="subid" value="{{ $subject->id }}">
                                <input type="hidden" name="appl_id" value="{{ $applicants->id }}">
                                <button type="submit" class="btn btn-success btn-sm">Add To Finalist List

                                    <i data-bs-container="body"
                                       data-bs-toggle="popover"
                                       data-bs-placement="top"
                                       data-bs-content="A Finalist Page is simply another Score Page but for applicants that you will be considering hiring. Think of this as applicants who have passed the initial hiring stage and now have moved one step closer to actually being chosen for the position. You can add an unlimited number of applicants to the Finalist Page. Each Score Page has it’s own dedicated Finalist Page." class="fas fa-info-circle"></i>

                                </button>
                            </form>
                            @else
                                <a class="btn btn-success btn-sm" href="/finalists/{{ $subject->id }}"> Go Finalist List

                                    <i data-bs-container="body"
                                       data-bs-toggle="popover"
                                       data-bs-placement="top"
                                       data-bs-content="A Finalist Page is simply another Score Page but for applicants that you will be considering hiring. Think of this as applicants who have passed the initial hiring stage and now have moved one step closer to actually being chosen for the position. You can add an unlimited number of applicants to the Finalist Page. Each Score Page has it’s own dedicated Finalist Page." class="fas fa-info-circle"></i>


                                </a>
                            @endif

                            <a class="btn btn-success btn-sm"
                               href="/applicant/{{ $applicants->id }}/{{ $subject->id }}">Open Applicant Profile</a> &nbsp;
                            <span class="d-none d-sm-inline"> {{ $applicants->name }}</span>
                            <p class="d-block d-sm-none">{{ $applicants->name }}</p>

                        </th>

                    </tr>
                    <tr>
                        <th class="fs-6">
                            Expectation Rating
                            <button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="The first column has 7 numbers which represent each of the 7 scores that an Applicant can receive. Ranging from +3 to -3">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </th>
{{--                        <th>{{ $applicants->total }} </th>--}}
                        <th class="fs-6">
                            Expectation Score
                            <button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="The second column allows you to see how many times this particular applicant received one of these 7 scores.">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </th>

                        <th class="fs-6">
                            Criteria
                            <button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="The third column allows you to see the actual criteria that the Applicant has received the score for.">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </th>

                    </tr>


                {{-- Main score board to display here --}}





{{--                    @php--}}
{{--                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,--}}
{{--   c.priority as criteria_priority, s.score_number,--}}
{{--   s.score_card_no--}}
{{--from criterias c--}}
{{--join scores s on c.id = s.criteria_id--}}
{{--join maincriterias m on c.maincriteria_id = m.id--}}
{{--where s.subject_id = ?--}}
{{--and s.criteria_id in (select id from criterias where subject_id = ?)--}}
{{--and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $subject->user_id, 4]);--}}
{{--                    @endphp--}}

{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            +4--}}
{{--                        </th>--}}
{{--                        <th>--}}

{{--                            {{ count($score) }}--}}

{{--                        </th>--}}
{{--                        <th>--}}
{{--                            @if(count($score) > 0)--}}
{{--                                <h4>{{ $score[0]->criteria_name }}</h4>--}}
{{--                                @foreach($score as $scorecard)--}}

{{--                                    <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>--}}

{{--                                    @php--}}
{{--                                        $exp = explode(",", $scorecard->criteria_priority);--}}
{{--                                    @endphp--}}
{{--                                    @foreach ($exp as $e)--}}
{{--                                        @if (count($exp) > 1)--}}
{{--                                            @php--}}
{{--                                                $width = "45%";--}}
{{--                                            @endphp--}}

{{--                                        @else--}}
{{--                                            @php--}}
{{--                                                $width = "100%";--}}
{{--                                            @endphp--}}

{{--                                        @endif--}}
{{--                                        <p class="btn score-priority"--}}
{{--                                           style="background-color: #{{ $e }}; border: 3px solid #{{ $e }}; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                        </p>--}}

{{--                                        <p style="margin-top: -25px;">{{ $scorecard->score_number }}</p>--}}

{{--                                        @if($scorecard->score_number == 5)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #138D07; border: 3px solid #138D07; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @elseif($scorecard->score_number == 4)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #40F328; border: 3px solid #40F328; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @elseif($scorecard->score_number == 3)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #FCD40A; border: 3px solid #FCD40A; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @elseif($scorecard->score_number == 2)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #F56A21; border: 3px solid #F56A21; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @elseif($scorecard->score_number == 1)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #FC0A0A; border: 3px solid #FC0A0A; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @endif--}}



{{--                                    @endforeach--}}

{{--                                @endforeach--}}
{{--                            @endif--}}


{{--                        </th>--}}
{{--                    </tr>--}}

                    @php
                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,
   c.priority as criteria_priority, s.score_number,
   s.score_card_no
from criterias c
join scores s on c.id = s.criteria_id
join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ?
and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $subject->user_id, 3]);
                    @endphp

                    <tr>
                        <th>
                            +3 <p class="sb-expect text-black-50">Greatly Exceeded Expectations</p>
                        </th>
                        <th>

                            {{ count($score) }}

                        </th>
                        <th>
                            @if(count($score) > 0)
                                <h4>{{ $score[0]->criteria_name }}</h4>
                                @foreach($score as $scorecard)

                                    <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>

{{--                                    @php--}}
{{--                                        $exp = explode(",", $scorecard->criteria_priority);--}}
{{--                                    @endphp--}}
{{--                                    @foreach ($exp as $e)--}}
{{--                                        @if (count($exp) > 1)--}}
{{--                                            @php--}}
{{--                                                $width = "45%";--}}
{{--                                            @endphp--}}

{{--                                        @else--}}
{{--                                            @php--}}
{{--                                                $width = "100%";--}}
{{--                                            @endphp--}}

{{--                                        @endif--}}


{{--                                            <p style="margin-top: -25px;">{{ $scorecard->score_number }}</p>--}}

{{--                                            @if ($scorecard->score_number == 1)--}}
{{--                                                <p--}}
{{--                                                   class="btn score-priority"--}}
{{--                                                   style="background-color: #40F328; border: 3px solid #40F328; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">--}}

{{--                                                </p>--}}
{{--                                            @elseif ($scorecard->score_number == 2)--}}
{{--                                                <p--}}
{{--                                                   class="btn score-priority"--}}
{{--                                                   style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">--}}

{{--                                                </p>--}}
{{--                                            @elseif ($scorecard->score_number == 3)--}}
{{--                                                <p--}}
{{--                                                   class="btn score-priority"--}}
{{--                                                   style="background-color: #022D02; border: 3px solid #022D02; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">--}}

{{--                                                </p>--}}
{{--                                            @elseif ($scorecard->score_number == 0)--}}
{{--                                                <p--}}
{{--                                                   class="btn score-priority"--}}
{{--                                                   style="background-color: #FCD40A; border: 3px solid #FCD40A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">--}}

{{--                                                </p>--}}
{{--                                            @elseif ($scorecard->score_number == 5)--}}
{{--                                                <p--}}
{{--                                                   class="btn score-priority"--}}
{{--                                                   style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">--}}

{{--                                                </p>--}}
{{--                                            @elseif ($scorecard->score_number == -1)--}}
{{--                                                <p--}}
{{--                                                   class="btn score-priority"--}}
{{--                                                   style="background-color: #F56A21; border: 3px solid #F56A21; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">--}}

{{--                                                </p>--}}
{{--                                            @elseif ($scorecard->score_number == -2)--}}
{{--                                                <p--}}
{{--                                                   class="btn score-priority"--}}
{{--                                                   style="background-color: #FC0A0A; border: 3px solid #FC0A0A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">--}}

{{--                                                </p>--}}
{{--                                            @elseif ($scorecard->score_number == -3)--}}
{{--                                                <p--}}
{{--                                                   class="btn score-priority"--}}
{{--                                                   style="background-color: #5E0303; border: 3px solid #5E0303; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">--}}

{{--                                                </p>--}}
{{--                                            @endif--}}



{{--                                    @endforeach--}}

                                @endforeach
                            @endif


                        </th>
                    </tr>

                    @php
                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,
   c.priority as criteria_priority, s.score_number,
   s.score_card_no
from criterias c
join scores s on c.id = s.criteria_id
join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ?
and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $subject->user_id, 2]);
                    @endphp

                    <tr>
                        <th>
                            +2 <p class="sb-expect text-black-50">Exceeded Expectations</p>
                        </th>
                        <th>

                            {{ count($score) }}

                        </th>
                        <th>
                            @if(count($score) > 0)
                                <h4>{{ $score[0]->criteria_name }}</h4>
                                @foreach($score as $scorecard)

                                    <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>



                                @endforeach
                            @endif


                        </th>
                    </tr>

                    @php
                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,
   c.priority as criteria_priority, s.score_number,
   s.score_card_no
from criterias c
join scores s on c.id = s.criteria_id
join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ?
and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $subject->user_id, 1]);
                    @endphp

                    <tr>
                        <th>
                            +1 <p class="sb-expect text-black-50">Slightly Exceeded Expectations</p>
                        </th>
                        <th>

                            {{ count($score) }}

                        </th>
                        <th>
                            @if(count($score) > 0)
                                <h4>{{ $score[0]->criteria_name }}</h4>
                                @foreach($score as $scorecard)

                                    <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>



                                @endforeach
                            @endif


                        </th>
                    </tr>

                    @php
                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,
   c.priority as criteria_priority, s.score_number,
   s.score_card_no
from criterias c
join scores s on c.id = s.criteria_id
join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ?
and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $subject->user_id, 0]);
                    @endphp

                    <tr>
                        <th>
                            0 <p class="sb-expect text-black-50">Met Expectations</p>
                        </th>
                        <th>

                            {{ count($score) }}

                        </th>
                        <th>
                            @if(count($score) > 0)
                                <h4>{{ $score[0]->criteria_name }}</h4>
                                @foreach($score as $scorecard)

                                    <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>



                                @endforeach
                            @endif


                        </th>
                    </tr>

                    @php
                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,
   c.priority as criteria_priority, s.score_number,
   s.score_card_no
from criterias c
join scores s on c.id = s.criteria_id
join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ?
and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $subject->user_id, '-1']);
                    @endphp

                    <tr>
                        <th>
                            -1 <p class="sb-expect text-black-50">Slightly Failed Expectations</p>
                        </th>
                        <th>

                            {{ count($score) }}

                        </th>
                        <th>
                            @if(count($score) > 0)
                                <h4>{{ $score[0]->criteria_name }}</h4>
                                @foreach($score as $scorecard)

                                    <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>



                                @endforeach
                            @endif


                        </th>
                    </tr>

                    @php
                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,
   c.priority as criteria_priority, s.score_number,
   s.score_card_no
from criterias c
join scores s on c.id = s.criteria_id
join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ?
and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $subject->user_id, '-2']);
                    @endphp

                    <tr>
                        <th>
                            -2 <p class="sb-expect text-black-50">Failed Expectations</p>
                        </th>
                        <th>

                            {{ count($score) }}

                        </th>
                        <th>
                            @if(count($score) > 0)
                                <h4>{{ $score[0]->criteria_name }}</h4>
                                @foreach($score as $scorecard)

                                    <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>



                                @endforeach
                            @endif


                        </th>
                    </tr>

                    @php
                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,
   c.priority as criteria_priority, s.score_number,
   s.score_card_no
from criterias c
join scores s on c.id = s.criteria_id
join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ?
and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $subject->user_id, '-3']);
                    @endphp

                    <tr>
                        <th>
                            -3 <p class="sb-expect text-black-50">Greatly Failed Expectations</p>
                        </th>
                        <th>

                            {{ count($score) }}

                        </th>
                        <th>
                            @if(count($score) > 0)
                                <h4>{{ $score[0]->criteria_name }}</h4>
                                @foreach($score as $scorecard)

                                    <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>



                                @endforeach
                            @endif


                        </th>
                    </tr>

{{--                    @php--}}
{{--                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,--}}
{{--   c.priority as criteria_priority, s.score_number,--}}
{{--   s.score_card_no--}}
{{--from criterias c--}}
{{--join scores s on c.id = s.criteria_id--}}
{{--join maincriterias m on c.maincriteria_id = m.id--}}
{{--where s.subject_id = ?--}}
{{--and s.criteria_id in (select id from criterias where subject_id = ?)--}}
{{--and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $subject->user_id, '-4']);--}}
{{--                    @endphp--}}

{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            -4--}}
{{--                        </th>--}}
{{--                        <th>--}}

{{--                            {{ count($score) }}--}}

{{--                        </th>--}}
{{--                        <th>--}}
{{--                            @if(count($score) > 0)--}}
{{--                                <h4>{{ $score[0]->criteria_name }}</h4>--}}
{{--                                @foreach($score as $scorecard)--}}

{{--                                    <p style="font-size: 14px;">{{ $scorecard->criteria_title }}</p>--}}

{{--                                    @php--}}
{{--                                        $exp = explode(",", $scorecard->criteria_priority);--}}
{{--                                    @endphp--}}
{{--                                    @foreach ($exp as $e)--}}
{{--                                        @if (count($exp) > 1)--}}
{{--                                            @php--}}
{{--                                                $width = "45%";--}}
{{--                                            @endphp--}}

{{--                                        @else--}}
{{--                                            @php--}}
{{--                                                $width = "100%";--}}
{{--                                            @endphp--}}

{{--                                        @endif--}}
{{--                                        <p class="btn score-priority"--}}
{{--                                           style="background-color: #{{ $e }}; border: 3px solid #{{ $e }}; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                        </p>--}}

{{--                                        <p style="margin-top: -25px;">{{ $scorecard->score_number }}</p>--}}

{{--                                        @if($scorecard->score_number == 5)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #138D07; border: 3px solid #138D07; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @elseif($scorecard->score_number == 4)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #40F328; border: 3px solid #40F328; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @elseif($scorecard->score_number == 3)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #FCD40A; border: 3px solid #FCD40A; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @elseif($scorecard->score_number == 2)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #F56A21; border: 3px solid #F56A21; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @elseif($scorecard->score_number == 1)--}}
{{--                                            <p class="btn score-priority"--}}
{{--                                               style="background-color: #FC0A0A; border: 3px solid #FC0A0A; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -8px; margin-top: -30px;">--}}

{{--                                            </p>--}}
{{--                                        @endif--}}



{{--                                    @endforeach--}}

{{--                                @endforeach--}}
{{--                            @endif--}}


{{--                        </th>--}}
{{--                    </tr>--}}

                </table>

            </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>

@include('layouts.footer')

@include('layouts.header', ['title' => $title])

<div class="container-fluid mt-6">

    @include('layouts.alert')


    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div class="text-center">
                <h2 class="display-4 text-center heading_txt">Scoreboard

                    <i style="font-size: 14px;" data-bs-container="body" data-bs-toggle="popover"
                       data-bs-placement="top" data-bs-content="The Scoreboard is the most valuable feature of Scorng. This allows agents and buyers to easily see which property, buyers have liked the most or the least, based on how many times they’ve given each of the 6 Scores to a property. Each time a buyer adds a score, the Scoreboard for that property is updated. Best of all, each buyer can have their own Scoreboard so you can compare and contrast.
<br><br>
<ul>
<li>+3 (Really Love It)</li>
<li>+2 (Love It)</li>
<li>+1 (Like It)</li>

<li>-3 (Really Really Don’t Like It)</li>
<li>-2 (Really Don’t Like It)</li>
<li>-1 (Don’t Like It)</li></ul>" class="fas fa-info-circle"></i>

                </h2>





                <table class="table mt-6 scorecard-header-table table-bordered">

                    <tr style="border: none">
                        <th style="border: none !important;">
                            <h5 class="text-left fw-bold">{{ $applicants->email }}</h5>
                        </th>
                        @if(count($agentA) > 0)
                        <th style="border: none !important;">
                            <h5 class="text-left fw-bold">{{ $subject->subject_name }}</h5>
                        </th>
                        @endif
                    </tr>
                    <tr style="border: none">
                        <th colspan="4" style="border: none !important;">
                            @php
                                $chkfinalist = DB::select("select count(*) as total from finalists where subject_id = ? and applicant_id = ?", [$subject->id, $applicants->id]);
                            @endphp

                            @role('buyer')
                            @if ($chkfinalist[0]->total == 0)
                            <form onsubmit="return confirm('Are you sure?')" action="{{ route("finalist.store") }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="subid" value="{{ $subject->id }}">
                                <input type="hidden" name="appl_id" value="{{ $applicants->id }}">
                                <button type="submit" class="btn btn-success btn-sm">Add To Finalist List

                                    <i data-bs-container="body"
                                       data-bs-toggle="popover"
                                       data-bs-placement="top"
                                       data-bs-content="A Finalist Page is simply another Score Page but for properties that buyers officially have considered buying. Think of these properties as ones that have “Made the cut”." class="fas fa-info-circle"></i>

                                </button>
                            </form>
                            @else
                                <a class="btn btn-success btn-sm" href="/finalists/{{ $subject->id }}"> Go Finalist List

                                    <i data-bs-container="body"
                                       data-bs-toggle="popover"
                                       data-bs-placement="top"
                                       data-bs-content="A Finalist Page is simply another Score Page but for properties that buyers officially have considered buying. Think of these properties as ones that have “Made the cut”." class="fas fa-info-circle"></i>


                                </a>
                            @endif
                            @endrole

                            <a class="btn btn-success btn-sm"
                               href="/applicant/{{ $applicants->id }}/{{ $subject->id }}">Open Property Profile</a> &nbsp;
                            <span class="d-none d-sm-inline"> {{ $applicants->name }}</span>
                            <p class="d-block d-sm-none">{{ $applicants->name }}</p>

                        </th>

                    </tr>
                    <tr>
                        <th class="fs-6">
                            Score Rating
                            <button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="The first column has 6 numbers which represent each of the 6 scores that a property can receive. Ranging from +3 to -3">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </th>
{{--                        <th>{{ $applicants->total }} </th>--}}
                        <th class="fs-6">
                            Buyer’s Scores
                            <button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="The second column allows you to see how many times this particular property received one of the 6 scores.
">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </th>

                        <th class="fs-6">
                            Criteria
                            <button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="The third column allows you to see the actual criteria that the property has received the score for.">
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
{{--and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $userid, 4]);--}}
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
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $userid, 3]);
                    @endphp

                    <tr>
                        <th>
                            +3 <p class="sb-expect text-black-50">Really Love It</p>
                        </th>
                        <th>

                            {{ count($score) }}

                        </th>
                        <th>
                            @if(count($score) > 0)

                                @foreach($score as $scorecard)
                                    <h4>{{ $scorecard->criteria_name }}</h4>
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
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $userid, 2]);
                    @endphp

                    <tr>
                        <th>
                            +2 <p class="sb-expect text-black-50">Love It</p>
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
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $userid, 1]);
                    @endphp

                    <tr>
                        <th>
                            +1 <p class="sb-expect text-black-50">Like It</p>
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

                    {{-- @php
                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,
   c.priority as criteria_priority, s.score_number,
   s.score_card_no
from criterias c
join scores s on c.id = s.criteria_id
join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ?
and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $userid, 0]);
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
                    </tr> --}}

                    @php
                        $score = DB::select("select m.criteria_name, c.id as criteria_id, c.title as criteria_title,
   c.priority as criteria_priority, s.score_number,
   s.score_card_no
from criterias c
join scores s on c.id = s.criteria_id
join maincriterias m on c.maincriteria_id = m.id
where s.subject_id = ?
and s.criteria_id in (select id from criterias where subject_id = ?)
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $userid, '-1']);
                    @endphp

                    <tr>
                        <th>
                            -1 <p class="sb-expect text-black-50">Really Really Don’t Like It</p>
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
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $userid, '-2']);
                    @endphp

                    <tr>
                        <th>
                            -2 <p class="sb-expect text-black-50">Really Don’t Like It</p>
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
and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $userid, '-3']);
                    @endphp

                    <tr>
                        <th>
                            -3 <p class="sb-expect text-black-50">Don't Like It</p>
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
{{--and s.applicant_id = ? and s.user_id = ? and s.score_number = ?", [$subject->id, $subject->id, $applicants->id, $userid, '-4']);--}}
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

@include('layouts.header', ['title' => $title])

<style>
    .table tr {
        width: 100%;
        border-top: 1px solid #ADADAD;
    }

</style>

<div class="container-fluid mt-4">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div style="float: right; font-size: 30px;">
                {{-- <a style="color: #138D07 !important;" class="text-dark" href="/scorepage-grid/{{$subjs->id}}"> <i --}}
                {{-- class="bi bi-grid-fill"></i> --}}

                {{-- <i style="font-size: 14px;" data-bs-container="body" --}}
                {{-- data-bs-toggle="popover" --}}
                {{-- data-bs-placement="top" --}}
                {{-- data-bs-content="Grid View is simply an easier way to consume information by looking at it in no more than two columns. Less scrolling side to side and more time to consume important information." --}}
                {{-- class="fas fa-info-circle"></i> --}}

                {{-- </a> --}}
            </div>
            <div class="">


                @livewire('inlineedit', ['subject_name' => $subjs->subject_name, 'subject_id' => $subjs->id,
                'main_subject_name' => 0, 'main_subject_id' => 0])

                <h5 style="margin-top: -5px;" class="display-7 text-left heading_txt">Score Page

                    <i style="text-align: center !important; font-size: 14px;" data-bs-container="body"
                        data-bs-toggle="popover" data-bs-placement="top"
                        data-bs-content="This is the page where you can actually give scores to each Applicant. This first step is to add Criteria, get as detailed as possible so the score that you give each Applicant represents the most detail and in turn represents who is the most qualified Applicant to hire.<br><br>

The second step is to add and Applicant, and finally is to actually give one of 7 scores to each Applicant within each Criteria." class="fas fa-info-circle"></i>

                </h5>


                <div class="mt-4">

                    <div class="text-left">
                        {{-- <a href="/create-scoring-sheet/{{ $subjs->id }}" class="btn btn-info btn-sm">Create A Score</a> --}}
                        <a href="/create-applicant/{{ $subjs->id }}" class="btn btn-success btn-sm mt-2"
                            id="add_app">Add
                            Property <i data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                data-bs-content="This is how you add an applicant to your Scorng account and to a Score Page. Simply click the button and open the page to enter in their name, email address, phone number and add any files and notes associated with this Applicant. Only the Main Team Member can add an Applicant. Team Members who have been invited, cannot add an Applicant."
                                class="fas fa-info-circle"></i> </a>
                        {{-- <a href="/create-criteria/{{ $subjs->id }}" class="btn btn-success btn-sm mt-2">Add Criteria</a> --}}
                        {{-- <a href="/create-applicant" class="btn btn-success btn-sm">Delete Applicant</a> --}}

                        @if(count($agentB) == 0)
                        <form action="{{ route('remove-page') }}" method="post" @class('d-inline')
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            <input type="hidden" name="subject_id" value="{{ $subjs->id }}" required>

                            <button type="submit" @class('btn btn-success btn-sm mt-2')>Delete Page

                                <i data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                    data-bs-content="This button simply allows you to delete this particular Score Page. Please remember that once you delete it, all of the data is permanently deleted and CANNOT be retrieved."
                                    class="fas fa-info-circle"></i>

                            </button>
                        </form>
                        @endif

{{--                        @if(count($agentB) == 0)--}}
                        <a href="/finalists/{{ $subjs->id }}" class="btn btn-success btn-sm mt-2">Finalist Page
                            <i data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                data-bs-content="A Finalist Page is simply another Score Page but for applicants that you will be considering hiring. Think of this as applicants who have passed the initial hiring stage and now have moved one step closer to actually being chosen for the position. You can add an unlimited number of applicants to the Finalist Page. Each Score Page has it’s own dedicated Finalist Page."
                                class="fas fa-info-circle"></i>
                        </a>
{{--                        @endif--}}
                        {{-- <a href="/bulkemaillist/{{$subjs->id}}" class="btn btn-success btn-sm mt-2">Bulk Email List --}}
                        {{-- <i data-bs-container="body" --}}
                        {{-- data-bs-toggle="popover" --}}
                        {{-- data-bs-placement="top" --}}
                        {{-- data-bs-content="The Bulk Email List allows you to add any applicants who weren’t chosen but you would still like to easily have access to their email address in case you have future job openings. This way you can easily download multiple emails in one click and email applicants that you have already scored, a link to a new job posting." --}}
                        {{-- class="fas fa-info-circle"></i> --}}
                        {{-- </a> --}}
                        @unlessrole('buyer')
                        @if(count($agentB) == 0)
                        <a href="/add-team-member/{{ $subjs->id }}" class="btn btn-success btn-sm mt-2">Invite Agent
                            <i data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                data-bs-content="Team Members allow you to add anyone who you would like to also score applicants. This way you can hear other people’s opinions so that you can make a more comprehensive hiring decision."
                                class="fas fa-info-circle"></i>
                        </a>
                        @endif
                        @endunlessrole
                        <a href="/rooms/{{ $subjs->id }}" class="btn btn-success btn-sm mt-2">Message Room
                            <i data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                data-bs-content="Message Rooms allows you to discuss in detail various aspects about anything associated with a Score Page. So you can discuss the criteria, applicants, scores and more. Each Score Page has it’s own set of Message Rooms. So you can create an unlimited number of Message Rooms for each detailed topic so you and your Team Members stay organized and remember what you discussed."
                                class="fas fa-info-circle"></i>
                        </a>

                        {{-- <a onclick="return confirm('Are you sure?')" href="/position-filled/{{$subjs->id}}" --}}
                        {{-- class="btn btn-dark btn-sm mt-2"> --}}
                        {{-- Position Filled --}}

                        {{-- <i data-bs-container="body" --}}
                        {{-- data-bs-toggle="popover" --}}
                        {{-- data-bs-placement="top" --}}
                        {{-- data-bs-content="Position Filled" class="fas fa-info-circle"></i> --}}

                        {{-- </a> --}}


                    </div>


                    {{-- <div class="devider"></div> --}}

                    {{-- Applicants & Criteria Loop --}}
                    <div class="row text-center">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-6 table-borderless">

                                    <tbody>
                                        {{-- <tr>
                                            <td colspan="3" style="height: 60px; border: none;"></td>
                                        </tr> --}}
                                        @php
                                            $i = 1;
                                        @endphp

                                        @foreach ($applicants as $applicant)
                                            {{-- @if (count($maincriterias) > 0 && count($applicants) > 0) --}}
                                            {{-- <tr> --}}
                                            {{-- <td colspan="@php echo count($subjects)+2; @endphp" --}}
                                            {{-- style=" border-top: 2px solid #707070 !important; padding-bottom: 0px; text-align: left;" --}}
                                            {{-- >&nbsp; --}}
                                            {{-- </td> --}}
                                            {{-- </tr> --}}
                                            {{-- @endif --}}

                                            {{-- ------------------------------------------------------- --}}

                                            @php
                                                $maincriterias = \Illuminate\Support\Facades\DB::select('SELECT maincriterias.`criteria_name`, maincriterias.`id` FROM maincriterias LEFT JOIN criterias ON (maincriterias.`id`=criterias.`maincriteria_id`) WHERE criterias.`subject_id` = ? AND criterias.applicant_id = ? GROUP BY maincriterias.`id`', [$sid, $applicant->id]);
                                            @endphp

                                            @if (count($maincriterias) > 0 && count($applicants) > 0)
                                                @if ($i > 1)
                                                    <tr style="border-top: 1px solid; height: 80px">
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                @endif
                                                <tr style="border-top: 2px solid #000; border-bottom: 2px solid #000;">
                                            @endif

                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            @foreach ($maincriterias as $main)
                                                @php

                                                    $colspan_main = DB::select(
                                                        "SELECT COUNT(id) AS total FROM
                                                                                                                criterias WHERE maincriteria_id = ? ",
                                                        [$main->id],
                                                    );

                                                    //get total main criteria number
                                                    //$total_main = DB::select("SELECT SUM(scores.score_number) AS total FROM scores WHERE subject_id = ? AND scores.`criteria_id` IN (SELECT id FROM criterias WHERE maincriteria_id = ?)", [$sid, $main->id])

                                                @endphp
                                                <th colspan="{{ $colspan_main[0]->total }}"
                                                    style="text-align: center; border-left: 2px solid #000; vertical-align: middle; font-size: 20px; font-weight: 700; padding-top: 20px;">

                                                    @livewire('inlineeditmaincriteria', ['criteria_name' =>
                                                    $main->criteria_name,
                                                    'main_criteria_id' => $main->id])


                                                    <p style="font-size: 34px;" class="fw-bold">
                                                        {{-- {{ $total_main[0]->total }} --}}
                                                    </p>

                                                </th>
                                            @endforeach
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th style="vertical-align: middle;">&nbsp;
                                                    @role('buyer')
                                                    <a class="btn btn-success btn-sm"
                                                        href="/create-criteria/{{ $sid }}/{{ $applicant->id }}">Add
                                                        Criteria</a>
                                                        @endrole

                                                </th>
                                                {{-- <th style="border-left: 2px solid #000;">&nbsp;</th> --}}

                                                @php
                                                    $subjects = \App\Models\Criteria::where('subject_id', '=', $sid)
                                                        ->where('applicant_id', '=', $applicant->id)
                                                        ->orderBy('maincriteria_id', 'ASC')
                                                        ->get();
                                                @endphp

                                                @foreach ($subjects as $data)
                                                    <th
                                                        style="text-align: center; border-left: 2px solid #000; vertical-align: middle; font-weight: 700; padding-top: 20px;">


                                                        @livewire('inlineeditcriteria', ['title' => $data->title,
                                                        'criteria_id' => $data->id])


                                                        @php
                                                            $exp = explode(',', $data->priority);

                                                        @endphp
                                                        @foreach ($exp as $e)
                                                            @if (count($exp) > 1)
                                                                @php
                                                                    $width = '45%';
                                                                @endphp

                                                            @else
                                                                @php
                                                                    $width = '100%';
                                                                @endphp

                                                            @endif
                                                            {{-- <label class="btn score-priority" --}}
                                                            {{-- style="background-color: #{{ $e }}; border: 3px solid #{{ $e }}; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; "></label> --}}
                                                            @if ($data->note != '')
                                                                <button style="font-size: 12px;" type="button"
                                                                    class="btn fw-light" data-bs-container="body"
                                                                    data-bs-toggle="popover" data-bs-placement="top"
                                                                    title="Important Note"
                                                                    data-bs-content="{{ $data->note }}">
                                                                    "Important Note"
                                                                </button>
                                                            @endif

                                                            @if ($data->photo != '')
                                                                <button style="font-size: 12px;" type="button"
                                                                    class="btn fw-light" data-bs-container="body"
                                                                    data-bs-toggle="popover" data-bs-placement="top"
                                                                    title=" Photo"
                                                                    data-bs-content="<img class='criteria-photo' src='{{ asset('uploads') }}/{{ $data->photo }}'/>">
                                                                    <i class="fas fa-camera"></i> "Photo"
                                                                </button>
                                                            @endif

                                                        @endforeach
                                                    </th>

                                                @endforeach

                                            </tr>


                                            {{-- -------------------------------------------------------------- --}}

                                            <tr>
                                                {{-- border-bottom: 1px solid #ccc !important; --}}

                                                <td
                                                    style="border-right: 2px solid; border-bottom: 1px solid #ADADAD !important; border-top: 2px solid #707070 !important; padding-bottom: 0px; text-align: left;">
                                                    {{-- @php echo count($subjects) + 2; @endphp --}}

                                                    <div style="font-size: 18px;" class="fw-bold mb-3">
                                                        <p class="fs-5 mb-2"><a
                                                                style=" text-decoration: none; color: #138D07;"
                                                                href="/applicant/{{ $applicant->id }}/{{ $subjs->id }}">
                                                                {{ $applicant->email }}

                                                            </a>

                                                        </p>
                                                        {{-- <span> --}}
                                                        {{-- <a href="/scorecard/{{ $subjs->id }}/{{ $applicant->id }}"> --}}
                                                        {{-- <img style="width: 30px; height: 30px;" --}}
                                                        {{-- src="{{ asset('images/scoreboard.png') }}"> --}}
                                                        {{-- </a> --}}
                                                        {{-- <i data-bs-container="body" --}}
                                                        {{-- data-bs-toggle="popover" --}}
                                                        {{-- data-bs-placement="top" --}}
                                                        {{-- data-bs-content="This is the most important feature of Scorng. The Scoreboard allows you to see and measure how well an Applicant did based on how many times they received a particular score based on the following 7 scores below.<br> --}}

                                                        {{-- These numbers are only based on the scores given by the Main Team Member. The second column allows you to see how many times this particular applicant received one of these 7 scores. The third column allows you to see the actual criteria that the Applicant has received the score for. --}}
                                                        {{-- <br><br> --}}
                                                        {{-- <p>Greatly Exceeded Expectations</p> --}}
                                                        {{-- <p>Exceeded Expectations</p> --}}
                                                        {{-- <p>Slightly Exceeded Expectations</p> --}}
                                                        {{-- <p>Met Expectations</p> --}}
                                                        {{-- <p>Slightly Failed Expectations</p> --}}
                                                        {{-- <p>Failed Expectations</p> --}}
                                                        {{-- <p>Greatly Failed Expectations</p>" class="fas fa-info-circle"></i> --}}


                                                        {{-- </span> --}}

                                                    </div>

                                                </td>


                                                @for ($i = 1; $i <= count($subjects) + 1; $i++)
                                                    <td style="@if ($i < count($subjects) + 1) border-right: 2px solid; @endif border-bottom: 1px solid #ADADAD !important; border-top: 2px solid #707070 !important; padding-bottom: 0px; text-align: center; vertical-align: middle !important;
                                                        ">

                                                        @if ($i == 1)
                                                            <i data-bs-container="body" data-bs-toggle="popover"
                                                                data-bs-placement="top"
                                                                data-bs-content="This is the score that adds up all of the individual scores that you have given a particular applicant based on all of the criteria that have been created."
                                                                class="fas fa-info-circle"></i>
                                                        @else

                                                            <i data-bs-container="body" data-bs-toggle="popover"
                                                                data-bs-placement="top"
                                                                data-bs-content="Colored rectangles represent the score that was assigned by a Team Member to an Applicant within a particular criteria.

<br><br> Scoring works as follows: <br><br>
<p>Light Green (+1) Slightly Exceeded Expectations</p>
<p>Green (+2) Exceeded Expectations</p>
<p>Dark Green (+3) Greatly Exceeded Expectations.</p>
<p>Yellow (0) Met Expectations</p>
<p>Orange (-1) Slightly Failed Expectations</p>
<p>Red (-2) Failed Expectations</p>
<p>Dark Red (-3) Greatly Failed Expectations</p>
<br>
<h5 style='line-height: 40px; font-size: 18px;'>The plus sign is what you select to add a score to an Applicant within a particular criteria.</h5>"
                                                                class="fas fa-info-circle"></i>

                                                        @endif
                                                    </td>
                                                @endfor


                                                @php
                                                    // getting users from subject id
                                                    $users = DB::select('SELECT users.id,users.name FROM users LEFT JOIN teams ON (users.email=teams.user_email) WHERE teams.subject_id = ?', [$subjs->id]);

                                                @endphp

                                                @foreach ($users as $user)
                                            <tr class="noBorder" style="vertical-align: middle;">
                                                @php
                                                    $total_sum = DB::select('SELECT SUM(scores.score_number) AS total FROM scores WHERE user_id = ? AND applicant_id = ? AND subject_id = ?', [$user->id, $applicant->id, $subjs->id]);

                                                @endphp
                                                <td style="@if ($total_sum[0]->total != '') text-align: left; @else text-align: left; @endif">
                                                    <p class="fw-bold">
                                                        @if(count($agentB) == 0)
                                                        {{ $user->name }}
                                                        @endif

                                                            <br>

                                                        {{-- <a style="color: #138D07 !important; font-size: 24px;" --}}
                                                        {{-- class="text-dark" --}}
                                                        {{-- href="/scorepage-grid/{{ $subjs->id }}/{{ $applicant->id }}"> --}}
                                                        {{-- <i class="bi bi-grid-fill"></i> </a> --}}

                                                        {{-- <i data-bs-container="body" data-bs-toggle="popover" --}}
                                                        {{-- data-bs-placement="top" --}}
                                                        {{-- data-bs-content="Grid View is simply an easier way to consume information by looking at it in no more than two columns. Less scrolling side to side and more time to consume important information." --}}
                                                        {{-- class="fas fa-info-circle"></i> --}}


                                                        <span>
                                                            <a
                                                                href="/scorecard/{{ $subjs->id }}/{{ $applicant->id }}/{{ $user->id }}">
                                                                <img style="width: 30px; height: 30px;"
                                                                    src="{{ asset('images/scoreboard.png') }}">
                                                            </a>
                                                            <i data-bs-container="body" data-bs-toggle="popover"
                                                                data-bs-placement="top" data-bs-content="This is the most important feature of Scorng. The Scoreboard allows you to see and measure how well an Applicant did based on how many times they received a particular score based on the following 7 scores below.<br>

These numbers are only based on the scores given by the Main Team Member. The second column allows you to see how many times this particular applicant received one of these 7 scores. The third column allows you to see the actual criteria that the Applicant has received the score for.
<br><br>
<p>Greatly Exceeded Expectations</p>
<p>Exceeded Expectations</p>
<p>Slightly Exceeded Expectations</p>
<p>Met Expectations</p>
<p>Slightly Failed Expectations</p>
<p>Failed Expectations</p>
<p>Greatly Failed Expectations</p>" class="fas fa-info-circle"></i>


                                                        </span>


                                                    </p>
                                                </td>
                                                <td
                                                    style="text-align: center; border-left: 2px solid #000; vertical-align: top;">
                                                    <p style="font-size: 40px;  margin-top: -10px;"
                                                        class="fw-bold">


                                                        {{ $total_sum[0]->total }}

                                                        @if ($total_sum[0]->total != '')
                                                            {{-- <div class="number_tota_l"><i --}}
                                                            {{-- style="text-align: center !important; font-size: 14px;" --}}
                                                            {{-- data-bs-container="body" data-bs-toggle="popover" --}}
                                                            {{-- data-bs-placement="top" data-bs-content="This is the score that adds up all of the individual scores that you have given a particular applicant based on all of the criteria that have been created." --}}
                                                            {{-- class="fas fa-info-circle icon-left"></i></div> --}}
                                                        @endif


                                                    </p>


                                                </td>
                                                {{-- <td style="text-align: left; vertical-align: middle !important;"> --}}

                                                {{-- <p class="fw-bold" --}}
                                                {{-- style="font-size: 42px;"> --}}
                                                {{--  --}}

                                                {{-- </p> --}}
                                                {{-- </td> --}}

                                                @foreach ($subjects as $data)

                                                    <td style="border-left: 2px solid #000; vertical-align: top">

                                                        <div class="text-left" style="position: relative;">
                                                            @php
                                                                $results = DB::select(
                                                                    "SELECT scores.id,scores.score_number,subjects.subject_name,criterias.title,applicants.name FROM scores
                                                                                                                                    LEFT JOIN subjects ON (scores.subject_id=subjects.id)
                                                                                                                                    LEFT JOIN criterias ON (scores.criteria_id=criterias.id)
                                                                                                                                    LEFT JOIN applicants ON (scores.applicant_id=applicants.id)
                                                                                                                                    WHERE subjects.id = ? AND applicants.id = ? AND criterias.id = ? AND scores.user_id = ?",
                                                                    [$subjs->id, $applicant->id, $data->id, $user->id],
                                                                );

                                                            @endphp

                                                            @role('buyer')
                                                            @if (count($results) === 0 && $user->id === auth()->user()->id)
                                                                <a onclick="openModalCreateScore('{{ $subjects[0]->subject->id }}', '{{ $applicant->id }}', '{{ $data->title }}', '{{ $subjects[0]->subject->subject_name }}', '{{ $applicant->name }}', '{{ $data->id }}')"
                                                                    class="btn btn-link text-center"
                                                                    style="color: #138D07; font-weight: bold; font-size: 20px; text-decoration: none;"
                                                                    href="javascript:void(0)"><i
                                                                        class="fas fa-plus"></i>


                                                                </a>


                                                            @endif
                                                            @endrole

                                                            @foreach ($results as $result)

                                                                <span
                                                                    onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                                    class="fw-bold fs-2">{{ $result->score_number }}
                                                                    <i class="bi bi-pencil-square"></i></span>

                                                                {{-- @if ($result->score_number == 1) --}}
                                                                {{-- <label --}}
                                                                {{-- onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})" --}}
                                                                {{-- class="btn score-priority" --}}
                                                                {{-- style="background-color: #40F328; border: 3px solid #40F328; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; "> --}}


                                                                {{-- </label> --}}



                                                                {{-- @elseif ($result->score_number == 2) --}}
                                                                {{-- <label --}}
                                                                {{-- onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})" --}}
                                                                {{-- class="btn score-priority" --}}
                                                                {{-- style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; "> --}}


                                                                {{-- </label> --}}


                                                                {{-- @elseif ($result->score_number == 3) --}}
                                                                {{-- <label --}}
                                                                {{-- onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})" --}}
                                                                {{-- class="btn score-priority" --}}
                                                                {{-- style="background-color: #022D02; border: 3px solid #022D02; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; "> --}}

                                                                {{-- </label> --}}

                                                                {{-- @elseif ($result->score_number == 0) --}}
                                                                {{-- <label --}}
                                                                {{-- onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})" --}}
                                                                {{-- class="btn score-priority" --}}
                                                                {{-- style="background-color: #FCD40A; border: 3px solid #FCD40A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; "> --}}

                                                                {{-- </label> --}}

                                                                {{-- @elseif ($result->score_number == 5) --}}
                                                                {{-- <label --}}
                                                                {{-- onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})" --}}
                                                                {{-- class="btn score-priority" --}}
                                                                {{-- style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; "> --}}

                                                                {{-- </label> --}}

                                                                {{-- @elseif ($result->score_number == -1) --}}
                                                                {{-- <label --}}
                                                                {{-- onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})" --}}
                                                                {{-- class="btn score-priority" --}}
                                                                {{-- style="background-color: #F56A21; border: 3px solid #F56A21; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; "> --}}

                                                                {{-- </label> --}}

                                                                {{-- @elseif ($result->score_number == -2) --}}
                                                                {{-- <label --}}
                                                                {{-- onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})" --}}
                                                                {{-- class="btn score-priority" --}}
                                                                {{-- style="background-color: #FC0A0A; border: 3px solid #FC0A0A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; "> --}}

                                                                {{-- </label> --}}

                                                                {{-- @elseif ($result->score_number == -3) --}}
                                                                {{-- <label --}}
                                                                {{-- onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})" --}}
                                                                {{-- class="btn score-priority" --}}
                                                                {{-- style="background-color: #5E0303; border: 3px solid #5E0303; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; "> --}}

                                                                {{-- </label> --}}

                                                                {{-- @endif --}}

                                                            @endforeach


                                                        </div>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </td>

                                        </tr>
                                        {{-- <tr><td>&nbsp;</td></tr> --}}
                                        @endforeach
                                        @php
                                            $i++;
                                        @endphp
                                        <tr style="border: 2px solid #000 !important;"></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>


@include('layouts.footer')

<div class="modal fade" id="create_score" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="display-6 text-center heading_txt" id="staticBackdropLabel">Create A Score</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <span class="fw-bold">Buyer's Name</span>
                            <input style="border: none;" readonly type="text" id="sub_name">
                        </div>
                        <div class="col">
                            <span class="fw-bold">Property Address</span>
                            <input style="border: none;" readonly type="text" id="appli_name">
                        </div>
                        <div class="col">
                            <span class="fw-bold">Criteria Name</span>
                            <input style="border: none;" readonly type="text" id="crit">
                        </div>
                    </div>
                </div>


                <div class="box mt-4">
                    <form action="{{ route('score.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <select required class="form-control @error('subject') is-invalid @enderror"
                                name="score_give">
                                <option value="" disabled selected>Choose A Score</option>


                                @foreach ($scores_array as $key => $score)
                                    <option value="{{ $score }}"
                                        {{ old('score_give') == $score ? 'selected' : '' }}>{{ $key }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <textarea name="note" class="form-control @error('note') is-invalid @enderror"
                                placeholder="Write your notes... (Optional)">{{ old('note') }}</textarea>
                        </div>


                        <input type="hidden" id="appl" name="appl">
                        <input type="hidden" id="sub" name="sub">
                        <input type="hidden" id="crit_id" name="crit_id">

                        <input style="display: none;" type="file" id="img" name="image" class="form-control">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="button" class="btn btn-dark btn-md" onclick="selectPhoto()">Add File</button>
                            <button type="submit" class="btn btn-dark btn-md">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


{{-- edit score modal --}}


<div class="modal fade" id="edit_score" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="display-6 text-center heading_txt" id="edit_score_heading">Create A Score</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="edit_score_body_html">


            </div>
        </div>
    </div>
</div>


{{-- Button Info message --}}

<div class="modal fade" id="info_msg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="display-6 text-center heading_txt" id="edit_score_heading">Create A Score</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="info_msg_body_html">


            </div>
        </div>
    </div>
</div>


<script>
    function openModalCreateScore(sub, appl, crit, sub_name, appli_name, crit_id) {
        $("#create_score").modal("show");
        document.getElementById("sub").value = sub;
        document.getElementById("appl").value = appl;
        document.getElementById("crit").value = crit;

        // form ID
        document.getElementById("sub_name").value = sub_name;
        document.getElementById("appli_name").value = appli_name;
        document.getElementById("crit_id").value = crit_id;

    }

    function selectPhoto() {
        $("#img").trigger('click');
    }

    function editScoreModal(s, v) {
        $("#edit_score").modal("show")
        if (v == {{ auth()->user()->id }}) {
            $("#edit_score_heading").html("Edit Score")
        } else {
            $("#edit_score_heading").html("View Score")
        }


        $_token = "{{ csrf_token() }}";
        var s = s;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name=_token]').attr('content')
            },
            url: "{{ url('edit/score') }}",
            type: 'GET',
            cache: false,
            data: {
                's': s,
                '_token': $_token,
                'v': v
            }, //see the $_token
            datatype: 'html',
            beforeSend: function() {
                //something before send
            },
            success: function(data) {
                //success
                //var data = $.parseJSON(data);
                if (data.success == true) {
                    //user_jobs div defined on page
                    $('#edit_score_body_html').html(data.html);
                } else {
                    console.log(data.html)
                }
            },
            error: function(xhr, textStatus, thrownError) {
                alert(xhr + "\n" + textStatus + "\n" + thrownError);
            }
        });

    }
</script>


<script>
    function show_info_modal(key) {
        event.preventDefault();
        if (key == 'add_app') {
            $("#info_msg").modal("show");
            $("#info_msg_body_html").html(
                `Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. `
                );
        }
    }
</script>

@include('layouts.header', ['title' => $title])

<div class="container-fluid mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1"></div>
        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10">

            <h2 class="display-4 heading_txt">{{ $subject->subject_name ?? 'not' }}</h2>
            <h5 style="margin-top: -5px;" class="display-7 heading_txt">Scoring Page: Grid View</h5>

            <!----------- loop start ----------------->

            @foreach($applicants as $applicant)
                <h5 style="margin-top: -5px;" class="display-7 heading_txt mt-6"><a style="color: #000; text-decoration: none;" href="/applicant/{{ $applicant->id }}/{{ $subject->id }}"> {{ $applicant->name }}</a></h5>
                <h5 style="margin-top: -5px;" class="display-7 heading_txt mt-3">Total Score:
                    <span>{{ $applicant->total ?? 0 }}</span></h5>

                <hr/>

                @php
                    $users = DB::select("SELECT users.id,users.name FROM users LEFT JOIN teams ON (users.id=teams.user_id) WHERE teams.subject_id = ?", [$subject->id]);
                @endphp

                <div class="row">
                    @foreach($users as $user)
                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-2" style="display: flex; align-content: center; justify-content: center; align-items: center;">
                                <p class="fw-bold">{{ $user->name }}</p>
                            </div>
                            <div class="col-md-10">
                                <div class="table-responsive">
                                <table class="table mb-4">
                                    <tr>
                                        @foreach($criterias as $criteria)
                                        <th>
                                            <p style="font-size: 13px;">{{ $criteria->title }}</p>

                                            @if($criteria->priority == "138D07")
                                            <label
                                                   class="btn score-priority"
                                                   style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 20px; font-size: 14px; color: #fff; font-weight: bold; margin-left: -3px;">
                                            </label>
                                            @elseif($criteria->priority == "40F328")
                                                <label
                                                    class="btn score-priority"
                                                    style="background-color: #40F328; border: 3px solid #40F328; width: 100%; height: 20px; font-size: 14px; color: #fff; font-weight: bold; margin-left: -3px;">
                                                </label>
                                            @elseif($criteria->priority == "FCD40A")
                                                    <label
                                                        class="btn score-priority"
                                                        style="background-color: #FCD40A; border: 3px solid #FCD40A; width: 100%; height: 20px; font-size: 14px; color: #fff; font-weight: bold; margin-left: -3px;">
                                                    </label>
                                            @elseif($criteria->priority == "F56A21")
                                                        <label
                                                            class="btn score-priority"
                                                            style="background-color: #F56A21; border: 3px solid #F56A21; width: 100%; height: 20px; font-size: 14px; color: #fff; font-weight: bold; margin-left: -3px;">
                                                        </label>
                                            @elseif($criteria->priority == "FC0A0A")
                                                <label
                                                    class="btn score-priority"
                                                    style="background-color: #FC0A0A; border: 3px solid #FC0A0A; width: 100%; height: 20px; font-size: 14px; color: #fff; font-weight: bold; margin-left: -3px;">
                                                </label>
                                            @endif
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-------------- scores display --------------->
                                    <tr>
                                        @foreach($criterias as $criteria)
                                        <td>
                                            @php
                                                $results = DB::select("SELECT scores.id,scores.score_number,subjects.subject_name,criterias.title,applicants.name FROM scores
                                                LEFT JOIN subjects ON (scores.subject_id=subjects.id)
                                                LEFT JOIN criterias ON (scores.criteria_id=criterias.id)
                                                LEFT JOIN applicants ON (scores.applicant_id=applicants.id)
                                                WHERE subjects.id = ? AND applicants.id = ? AND criterias.id = ? AND scores.user_id = ?", [$subject->id,$applicant->id,$criteria->id,$user->id]);

                                            @endphp

                                            @foreach ($results as $result)

                                                @if ($result->score_number == 1)
                                                    <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                           class="btn score-priority"
                                                           style="background-color: #40F328; border: 3px solid #40F328; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                    </label>
                                                @elseif ($result->score_number == 2)
                                                    <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                           class="btn score-priority"
                                                           style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                    </label>
                                                @elseif ($result->score_number == 3)
                                                    <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                           class="btn score-priority"
                                                           style="background-color: #022D02; border: 3px solid #022D02; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                    </label>
                                                @elseif ($result->score_number == 0)
                                                    <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                           class="btn score-priority"
                                                           style="background-color: #FCD40A; border: 3px solid #FCD40A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                    </label>
                                                @elseif ($result->score_number == 5)
                                                    <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                           class="btn score-priority"
                                                           style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                    </label>
                                                @elseif ($result->score_number == -1)
                                                    <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                           class="btn score-priority"
                                                           style="background-color: #F56A21; border: 3px solid #F56A21; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                    </label>
                                                @elseif ($result->score_number == -2)
                                                    <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                           class="btn score-priority"
                                                           style="background-color: #FC0A0A; border: 3px solid #FC0A0A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                    </label>
                                                @elseif ($result->score_number == -3)
                                                    <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                           class="btn score-priority"
                                                           style="background-color: #5E0303; border: 3px solid #5E0303; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                    </label>
                                                @endif

                                            @endforeach

                                        </td>
                                        @endforeach
                                    </tr>


                                    <!----------------scores end ------------------>
                                </table>
                                </div>




                            </div>

                        </div>

                    </div>
{{--                    <div class="col-6">--}}

{{--                    </div>--}}
                    @endforeach
                </div>

            @endforeach


        </div>
        <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1"></div>
    </div>
</div>


@include('layouts.footer')


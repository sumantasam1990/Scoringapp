@include('layouts.header', ['title' => $title])

<div class="container-fluid mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div class="">
            <h2 class="display-4 text-center heading_txt">Applicant Page</h2>

            <div class="row mt-6">
                <div class="col-6">
                    <h4 class="fw-bold">Main Applicant Information</h4>
                </div>
                <div class="col-6 text-right">
                    {{-- <p style="float: right;"><a class="btn btn-success btn-sm" href="">Edit Information</a></p> --}}
                </div>
            </div>

            <hr />
            <table class="table">
                <tr>
                    <th>Full Name</th>
                    <td>{{ $applicants[0]->name }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>{{ $applicants[0]->email }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $applicants[0]->phone }}</td>
                </tr>
            </table>


            <div class="row mt-6">
                <div class="col-6">
                    <h4 class="fw-bold">Files & Documents</h4>
                </div>
                <div class="col-6 text-right">
                    {{-- <p style="float: right;"><a class="btn btn-success btn-sm" href="">Edit Information</a></p> --}}
                </div>
            </div>

            <hr />

            <div>
                <p><a target="_blank" style="color: #000;" href="{{ asset('uploads/' . $applicants[0]->photo) }}">{{ $applicants[0]->photo }}</a></p>
            </div>

            <div class="row mt-6">
                <div class="col-4">
                    <h4 class="fw-bold">Score Pages</h4>
                </div>
{{--                <div class="col-8">--}}
{{--                    <div class="text-right" style="float: right;">--}}

{{--                        <a class="btn btn-success btn-sm" href="/scorecard/{{ $subjs->id }}/{{ $applicants[0]->id }}">Scoreboard</a>--}}
{{--                        <a class="btn btn-success btn-sm" href="/scoring-sheet/{{ $subjs->id }}">Score Page</a>--}}
{{--                        <form action="{{ route('add-emaillist') }}" method="post" @class('d-inline')>--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="subject_id" value="{{ $subjs->id }}" required>--}}
{{--                            <input type="hidden" name="applicant_id" value="{{ $applicants[0]->id }}" required>--}}
{{--                            <button type="submit" @class('btn btn-success btn-sm')>Add To Bulk Email List</button>--}}
{{--                        </form>--}}

{{--                        <form action="{{ route('remove-applicant') }}" method="post" @class('d-inline') onsubmit="return confirm('Are you sure?')">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="subject_id" value="{{ $subjs->id }}" required>--}}
{{--                            <input type="hidden" name="applicant_id" value="{{ $applicants[0]->id }}" required>--}}
{{--                            <button type="submit" @class('btn btn-success btn-sm')>Remove Applicant</button>--}}
{{--                        </form>--}}

{{--                        @php--}}
{{--                        $chkfinalist = DB::select("select count(*) as total from finalists where subject_id = ? and applicant_id = ?", [$subjs->id, $applicants[0]->id]);--}}
{{--                    @endphp--}}
{{--                    @if ($chkfinalist[0]->total == 0)--}}

{{--                        <form onsubmit="return confirm('Are you sure?')" action="{{ route("finalist.store") }}" method="post" style="display: inline;">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="subid" value="{{ $subjs->id }}">--}}
{{--                            <input type="hidden" name="appl_id" value="{{ $applicants[0]->id }}">--}}
{{--                            <button type="submit" class="btn btn-success btn-sm">Add To Finalist List</button>--}}
{{--                        </form>--}}
{{--                        @else--}}
{{--                            <a class="btn btn-success btn-sm" style="text-decoration: none; color: #000; font-weight: bold;" href="/finalists/{{ $subjs->id }}"> Go Finalist List</a>--}}
{{--                    @endif--}}
{{--                    </div>--}}

{{--                </div>--}}
            </div>

            <hr />

            {{-- ------------------------score sheet----------------------------- --}}
                <div class="row">
                    <div class="col-md-2">
                        <h4><span class="fs-5">{{ $mainsubject->main_subject_name }}</span> <br/> {{ $subjs->subject_name }} </h4>
                    </div>
                    <div class="col-md-10 col-12 mt-3">
                        <div class="text-right" style="float: right;">

                            <a class="btn btn-success btn-sm" href="/scorecard/{{ $subjs->id }}/{{ $applicants[0]->id }}">Scoreboard</a>
                            <a class="btn btn-success btn-sm" href="/score-page/{{ $subjs->id }}">Score Page</a>
                            <form action="{{ route('add-emaillist') }}" method="post" @class('d-inline')>
                                @csrf
                                <input type="hidden" name="subject_id" value="{{ $subjs->id }}" required>
                                <input type="hidden" name="applicant_id" value="{{ $applicants[0]->id }}" required>
                                <button type="submit" @class('btn btn-success btn-sm')>Add To Bulk Email List</button>
                            </form>

                            <form action="{{ route('remove-applicant') }}" method="post" @class('d-inline') onsubmit="return confirm('Are you sure?')">
                                @csrf
                                <input type="hidden" name="subject_id" value="{{ $subjs->id }}" required>
                                <input type="hidden" name="applicant_id" value="{{ $applicants[0]->id }}" required>
                                <button type="submit" @class('btn btn-success btn-sm')>Remove Applicant</button>
                            </form>

                            @php
                                $chkfinalist = DB::select("select count(*) as total from finalists where subject_id = ? and applicant_id = ?", [$subjs->id, $applicants[0]->id]);
                            @endphp
                            @if ($chkfinalist[0]->total == 0)

                                <form onsubmit="return confirm('Are you sure?')" action="{{ route("finalist.store") }}" method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="subid" value="{{ $subjs->id }}">
                                    <input type="hidden" name="appl_id" value="{{ $applicants[0]->id }}">
                                    <button type="submit" class="btn btn-success btn-sm">Add To Finalist List</button>
                                </form>
                            @else
                                <a class="btn btn-success btn-sm" href="/finalists/{{ $subjs->id }}"> Go Finalist List</a>
                            @endif
                        </div>

                    </div>
                </div>

            <div class="table-responsive">
                <table class="table mt-4">
                    <thead>
                        <tr style="border-top: 2px solid #000; border-bottom: 2px solid #000;">
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            @foreach ($maincriterias as $main)
                            @php

                            $colspan_main = DB::select("SELECT COUNT(id) AS total FROM
                            criterias WHERE maincriteria_id = ? ", [$main->id]);

                            //get total main criteria number
                            $total_main = DB::select("SELECT SUM(scores.score_number) AS total FROM scores WHERE subject_id = ? AND scores.`criteria_id` IN (SELECT id FROM criterias WHERE maincriteria_id = ?)", [2, $main->id])

                            @endphp
                            <th colspan="{{ $colspan_main[0]->total }}" style="text-align: center; border-left: 2px solid #000;">
                                <h4 class="fw-bold">{{ $main->criteria_name }}</h4>
                                <p style="font-size: 34px;" class="fw-bold">
                                    {{ $total_main[0]->total }}
                                </p>

                            </th>
                            @endforeach
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            {{-- <th style="border-left: 2px solid #000;">&nbsp;</th> --}}
                            @foreach ($subjects as $data)
                            <th style="text-align: center; border-left: 2px solid #000; vertical-align: top; ">
                                <p>{{ $data->title }}</p>
                                @php
                                    $exp = explode(",", $data->priority);

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
{{--                                    <label class="btn score-priority" style="background-color: #{{ $e }}; border: 3px solid #{{ $e }}; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; margin-left: -3px;"></label>--}}

                                        @if($data->note != '')
                                            <button style="font-size: 12px;" type="button" class="btn fw-light" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" title="Important Note" data-bs-content="{{ $data->note }}">
                                                "Important Note"
                                            </button>
                                        @endif
                                @endforeach
                            </th>
                            @endforeach
                        </tr>

                    </thead>

                    <tbody>
                        {{-- <tr>
                            <td colspan="3" style="height: 60px; border: none;"></td>
                        </tr> --}}
                        @foreach ( $applicants as $applicant )
                        <tr>
                            <td style="border-right: 2px solid; border-bottom: 1px solid #ADADAD !important; border-top: 2px solid #707070 !important; padding-bottom: 0px; text-align: left;"
                            > {{-- @php echo count($subjects) + 2; @endphp --}}

                                <div style="font-size: 18px;" class="fw-bold mb-3">
                                    <p class="fs-5 mb-2"><a
                                            style="color: #000; text-decoration: none;"
                                            href="/applicant/{{ $applicant->id }}/{{ $subjs->id }}"> {{ $applicant->name }}

                                        </a>

                                    </p>
                                    <span>
                                                            <a href="/scorecard/{{ $subjs->id }}/{{ $applicant->id }}">
                                                            <img style="width: 30px; height: 30px;" src="{{ asset('images/scoreboard.png') }}">
                                                            </a>
                                                              <i data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover" class="fas fa-info-circle"></i>

                                                        </span>
                                </div>

                            </td>
                            @for($i=1; $i<=count($subjects)+2; $i++)
                                <td style="@if($i < count($subjects)+1) border-right: 2px solid; @endif border-bottom: 1px solid #ADADAD !important; border-top: 2px solid #707070 !important; padding-bottom: 0px; text-align: left;"
                                >

                                </td>
                        @endfor

                                @php
                                // getting users from subject id
                                $users = DB::select("SELECT users.id,users.name FROM users LEFT JOIN teams ON (users.id=teams.user_id) WHERE teams.subject_id = ?", [$subjs->id]);

                            @endphp

                                @foreach ($users as $user)
                                <tr class="noBorder">
                                    @php
                                        $total_sum = DB::select("SELECT SUM(scores.score_number) AS total FROM scores WHERE user_id = ? AND applicant_id = ? AND subject_id = ?", [$user->id,$applicant->id,$subjs->id]);

                                    @endphp
                                    <td style="@if($total_sum[0]->total != '') text-align: left; @else text-align: left; @endif">
                                        <p class="fw-bold">
                                            {{ $user->name }} <br>

                                            <a style="color: #138D07 !important; font-size: 24px;" class="text-dark" href="/scorepage-grid/{{ $subjs->id }}/{{ $applicant->id }}"> <i class="bi bi-grid-fill"></i> </a>

                                            <i data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover" class="fas fa-info-circle"></i>



                                        </p></td>
                                    <td style="text-align: left; border-left: 2px solid #000;">
                                        <p style="font-size: 42px; margin-left: 10px; margin-top: -10px;"
                                           class="fw-bold">


                                        {{ $total_sum[0]->total }}

                                        @if($total_sum[0]->total != '')
                                            <div class="number_tota_l"><i
                                                    style="text-align: center !important; font-size: 14px;"
                                                    data-bs-container="body" data-bs-toggle="popover"
                                                    data-bs-placement="top" data-bs-content="Top popover"
                                                    class="fas fa-info-circle icon-left"></i></div>
                                            @endif


                                            </p>
                                    </td>
                                    @foreach ($subjects as $data)

                                        <td style="border-left: 2px solid #000;">

                                            <div class="text-center">
                                                @php
                                                    $results = DB::select("SELECT scores.id,scores.score_number,subjects.subject_name,criterias.title,applicants.name FROM scores
                                                    LEFT JOIN subjects ON (scores.subject_id=subjects.id)
                                                    LEFT JOIN criterias ON (scores.criteria_id=criterias.id)
                                                    LEFT JOIN applicants ON (scores.applicant_id=applicants.id)
                                                    WHERE subjects.id = ? AND applicants.id = ? AND criterias.id = ? AND scores.user_id = ?", [$subjs->id,$applicant->id,$data->id,$user->id]);

                                                @endphp

                                                {{-- @if (count($results) == 0)
                                                    <a onclick="openModalCreateScore('{{$subjects[0]->subject->id}}', '{{$applicant->id}}', '{{$data->title}}', '{{$subjects[0]->subject->subject_name}}', '{{$applicant->name}}', '{{$data->id}}')" class="btn btn-link text-center" style="color: #138D07; font-weight: bold; font-size: 20px; text-decoration: none;" href="#"><i class="fas fa-plus"></i></a>
                                                @endif --}}

                                                @foreach ($results as $result)

                                                    @if ($result->score_number == 1)
                                                        <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                               class="btn score-priority"
                                                               style="background-color: #40F328; border: 3px solid #40F328; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                        </label>

                                                        <i data-bs-container="body"
                                                           data-bs-toggle="popover"
                                                           data-bs-placement="top"
                                                           data-bs-content="Top popover" class="fas fa-info-circle"></i>
                                                    @elseif ($result->score_number == 2)
                                                        <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                               class="btn score-priority"
                                                               style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                        </label>

                                                        <i data-bs-container="body"
                                                           data-bs-toggle="popover"
                                                           data-bs-placement="top"
                                                           data-bs-content="Top popover" class="fas fa-info-circle"></i>
                                                    @elseif ($result->score_number == 3)
                                                        <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                               class="btn score-priority"
                                                               style="background-color: #022D02; border: 3px solid #022D02; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                        </label>

                                                        <i data-bs-container="body"
                                                           data-bs-toggle="popover"
                                                           data-bs-placement="top"
                                                           data-bs-content="Top popover" class="fas fa-info-circle"></i>

                                                    @elseif ($result->score_number == 0)
                                                        <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                               class="btn score-priority"
                                                               style="background-color: #FCD40A; border: 3px solid #FCD40A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                        </label>

                                                        <i data-bs-container="body"
                                                           data-bs-toggle="popover"
                                                           data-bs-placement="top"
                                                           data-bs-content="Top popover" class="fas fa-info-circle"></i>
                                                    @elseif ($result->score_number == 5)
                                                        <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                               class="btn score-priority"
                                                               style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                        </label>

                                                        <i data-bs-container="body"
                                                           data-bs-toggle="popover"
                                                           data-bs-placement="top"
                                                           data-bs-content="Top popover" class="fas fa-info-circle"></i>
                                                    @elseif ($result->score_number == -1)
                                                        <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                               class="btn score-priority"
                                                               style="background-color: #F56A21; border: 3px solid #F56A21; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                        </label>

                                                        <i data-bs-container="body"
                                                           data-bs-toggle="popover"
                                                           data-bs-placement="top"
                                                           data-bs-content="Top popover" class="fas fa-info-circle"></i>
                                                    @elseif ($result->score_number == -2)
                                                        <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                               class="btn score-priority"
                                                               style="background-color: #FC0A0A; border: 3px solid #FC0A0A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                        </label>

                                                        <i data-bs-container="body"
                                                           data-bs-toggle="popover"
                                                           data-bs-placement="top"
                                                           data-bs-content="Top popover" class="fas fa-info-circle"></i>
                                                    @elseif ($result->score_number == -3)
                                                        <label onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                               class="btn score-priority"
                                                               style="background-color: #5E0303; border: 3px solid #5E0303; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                        </label>

                                                        <i data-bs-container="body"
                                                           data-bs-toggle="popover"
                                                           data-bs-placement="top"
                                                           data-bs-content="Top popover" class="fas fa-info-circle"></i>
                                                    @endif

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
                    </tbody>
                </table>
            </div>



            {{-- End --}}


            </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

{{--<script>--}}
{{--function selectPhoto() {--}}
{{--    $("#img").trigger('click');--}}
{{--}--}}
{{--</script>--}}


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

    function editScoreModal(s,v) {
        $("#edit_score").modal("show")
        if(v == {{ auth()->user()->id }}) {
            $("#edit_score_heading").html("Edit Score")
        } else {
            $("#edit_score_heading").html("View Score")
        }


        $_token = "{{ csrf_token() }}";
        var s = s;
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
            url: "{{ url('edit/score') }}",
            type: 'GET',
            cache: false,
            data: {'s': s, '_token': $_token, 'v': v }, //see the $_token
            datatype: 'html',
            beforeSend: function () {
                //something before send
            },
            success: function (data) {
                //success
                //var data = $.parseJSON(data);
                if (data.success == true) {
                    //user_jobs div defined on page
                    $('#edit_score_body_html').html(data.html);
                } else {
                    console.log(data.html)
                }
            },
            error: function (xhr, textStatus, thrownError) {
                alert(xhr + "\n" + textStatus + "\n" + thrownError);
            }
        });

    }

</script>

@include('layouts.header', ['title' => $title])

<div class="container-fluid mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div style="float: right; font-size: 30px;">
                <a style="color: #138D07 !important;" class="text-dark" href="/scorepage-grid/{{$subjs->id}}"> <i
                        class="bi bi-grid-fill"></i> <i onclick="show_info_modal('grid')"
                                                        style="margin-left: 3px; font-size: 12px;"
                                                        class="bi bi-info-circle-fill"></i></a>
            </div>
            <div class="">


                @livewire('inlineedit', ['subject_name' => $subjs->subject_name, 'subject_id' => $subjs->id,
                'main_subject_name' => $mainsubject->main_subject_name])

                <h5 style="margin-top: -5px;" class="display-7 text-left heading_txt">Scoring Page</h5>


                <div class="mt-4">

                    <div class="text-left">
                        {{--                        <a href="/create-scoring-sheet/{{ $subjs->id }}" class="btn btn-info btn-sm">Create A Score</a>--}}
                        <a href="/create-applicant/{{ $subjs->id }}" class="btn btn-success btn-sm mt-2" id="add_app">Add
                            Applicant <i onclick="show_info_modal('add_app')" style="margin-left: 3px;"
                                         class="bi bi-info-circle-fill"></i> </a>
                        <a href="/create-criteria/{{ $subjs->id }}" class="btn btn-success btn-sm mt-2">Add Criteria <i
                                onclick="show_info_modal('add_crit')" style="margin-left: 3px;"
                                class="bi bi-info-circle-fill"></i></a>
                        {{-- <a href="/create-applicant" class="btn btn-success btn-sm">Delete Applicant</a> --}}

                        <form action="{{ route('remove-page') }}" method="post"
                              @class('d-inline') onsubmit="return confirm('Are you sure?')">
                            @csrf
                            <input type="hidden" name="subject_id" value="{{ $subjs->id }}" required>

                            <button type="submit" @class('btn btn-success btn-sm mt-2')>Delete Page <i
                                    onclick="show_info_modal('del_page')" style="margin-left: 3px;"
                                    class="bi bi-info-circle-fill"></i></button>
                        </form>

                        <a href="/finalists/{{$subjs->id}}" class="btn btn-success btn-sm mt-2">Finalist Page <i
                                onclick="show_info_modal('finalist')" style="margin-left: 3px;"
                                class="bi bi-info-circle-fill"></i></a>
                        <a href="/bulkemaillist/{{$subjs->id}}" class="btn btn-success btn-sm mt-2">Bulk Email List <i
                                onclick="show_info_modal('email')" style="margin-left: 3px;"
                                class="bi bi-info-circle-fill"></i></a>
                        <a href="/add-team-member/{{$subjs->id}}" class="btn btn-success btn-sm mt-2">Add Team Member <i
                                onclick="show_info_modal('team')" style="margin-left: 3px;"
                                class="bi bi-info-circle-fill"></i></a>
                        <a href="/rooms/{{$subjs->id}}" class="btn btn-success btn-sm mt-2">Message Room <i
                                onclick="show_info_modal('room')" style="margin-left: 3px;"
                                class="bi bi-info-circle-fill"></i></a>


                    </div>


                    <div class="devider"></div>

                    {{-- Applicants & Criteria Loop --}}
                    <div class="row text-center">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-6 table-borderless">
                                    <thead>

                                    @if(count($maincriterias) > 0 && count($applicants) > 0)
                                        <tr style="border-top: 2px solid #000; border-bottom: 2px solid #000;">
                                            @endif

                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            @foreach ($maincriterias as $main)
                                                @php

                                                    $colspan_main = DB::select("SELECT COUNT(id) AS total FROM
                                                    criterias WHERE maincriteria_id = ? ", [$main->id]);

                                                    //get total main criteria number
                                                    //$total_main = DB::select("SELECT SUM(scores.score_number) AS total FROM scores WHERE subject_id = ? AND scores.`criteria_id` IN (SELECT id FROM criterias WHERE maincriteria_id = ?)", [$sid, $main->id])

                                                @endphp
                                                <th colspan="{{ $colspan_main[0]->total }}"
                                                    style="text-align: center; border-left: 2px solid #000;">
                                                    <h4 class="fw-bold">{{ $main->criteria_name }}</h4>
                                                    <p style="font-size: 34px;" class="fw-bold">
                                                        {{--                                                    {{ $total_main[0]->total }}--}}
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


                                                    @livewire('inlineeditcriteria', ['title' => $data->title,
                                                    'criteria_id' => $data->id])


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
                                                        {{--                                                    <label class="btn score-priority"--}}
                                                        {{--                                                           style="background-color: #{{ $e }}; border: 3px solid #{{ $e }}; width: {{ $width }}; height: 30px; color: #fff; font-weight: bold; "></label>--}}
                                                        @if($data->note != '')
                                                            <button style="font-size: 12px;" type="button"
                                                                    class="btn fw-light" data-bs-container="body"
                                                                    data-bs-toggle="popover" data-bs-placement="top"
                                                                    title="Important Note"
                                                                    data-bs-content="{{ $data->note }}">
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
                                        @if(count($maincriterias) > 0 && count($applicants) > 0)
                                            <tr>
                                                <td colspan="@php echo count($subjects)+2; @endphp"
                                                    style=" border-top: 2px solid #707070 !important; padding-bottom: 0px; text-align: left;"
                                                >&nbsp;
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            {{--                                            border-bottom: 1px solid #ccc !important;--}}

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
                                                            <img style="width: 30px; height: 30px;"
                                                                 src="{{ asset('images/scoreboard.png') }}">
                                                            </a>
                                                                                                                        <i data-bs-container="body"
                                                                                                                           data-bs-toggle="popover"
                                                                                                                           data-bs-placement="top"
                                                                                                                           data-bs-content="Top popover"
                                                                                                                           class="fas fa-info-circle"></i>


                                                        </span>

                                                </div>

                                            </td>


                                            @for($i=1; $i<=count($subjects)+1; $i++)
                                                <td style="@if($i < count($subjects)+1) border-right: 2px solid; @endif border-bottom: 1px solid #ADADAD !important; border-top: 2px solid #707070 !important; padding-bottom: 0px; text-align: left;"
                                                >

                                                </td>
                                        @endfor


                                        @php
                                            // getting users from subject id
                                            $users = DB::select("SELECT users.id,users.name FROM users LEFT JOIN teams ON (users.id=teams.user_id) WHERE teams.subject_id = ?", [$subjs->id]);

                                        @endphp

                                        @foreach ($users as $user)
                                            <tr class="noBorder" style="vertical-align: middle;">
                                                @php
                                                    $total_sum = DB::select("SELECT SUM(scores.score_number) AS total FROM scores WHERE user_id = ? AND applicant_id = ? AND subject_id = ?", [$user->id,$applicant->id,$subjs->id]);

                                                @endphp
                                                <td style="@if($total_sum[0]->total != '') text-align: left; @else text-align: left; @endif">
                                                    <p class="fw-bold">
                                                        {{ $user->name }} <br>

                                                        <a style="color: #138D07 !important; font-size: 24px;"
                                                           class="text-dark"
                                                           href="/scorepage-grid/{{ $subjs->id }}/{{ $applicant->id }}">
                                                            <i class="bi bi-grid-fill"></i> </a>

                                                        <i data-bs-container="body" data-bs-toggle="popover"
                                                           data-bs-placement="top" data-bs-content="Top popover"
                                                           class="fas fa-info-circle"></i>


                                                    </p></td>
                                                <td style="text-align: left; border-left: 2px solid #000; vertical-align: top;">
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
                                                {{--                                                <td style="text-align: left; vertical-align: middle !important;">--}}

                                                {{--                                                    <p class="fw-bold"--}}
                                                {{--                                                       style="font-size: 42px;">--}}
                                                {{--                                                       --}}

                                                {{--                                                    </p>--}}
                                                {{--                                                </td>--}}

                                                @foreach ($subjects as $data)

                                                    <td style="border-left: 2px solid #000; vertical-align: top">

                                                        <div class="text-left">
                                                            @php
                                                                $results = DB::select("SELECT scores.id,scores.score_number,subjects.subject_name,criterias.title,applicants.name FROM scores
                                                                LEFT JOIN subjects ON (scores.subject_id=subjects.id)
                                                                LEFT JOIN criterias ON (scores.criteria_id=criterias.id)
                                                                LEFT JOIN applicants ON (scores.applicant_id=applicants.id)
                                                                WHERE subjects.id = ? AND applicants.id = ? AND criterias.id = ? AND scores.user_id = ?", [$subjs->id,$applicant->id,$data->id,$user->id]);

                                                            @endphp

                                                            @if (count($results) === 0 && $user->id === auth()->user()->id)
                                                                <a onclick="openModalCreateScore('{{$subjects[0]->subject->id}}', '{{$applicant->id}}', '{{$data->title}}', '{{$subjects[0]->subject->subject_name}}', '{{$applicant->name}}', '{{$data->id}}')"
                                                                   class="btn btn-link text-center"
                                                                   style="color: #138D07; font-weight: bold; font-size: 20px; text-decoration: none;"
                                                                   href="#"><i class="fas fa-plus"></i></a>
                                                            @endif

                                                            @foreach ($results as $result)

                                                                @if ($result->score_number == 1)
                                                                    <label
                                                                        onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                                        class="btn score-priority"
                                                                        style="background-color: #40F328; border: 3px solid #40F328; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                                    </label>
                                                                    <button type="button" class="btn"
                                                                            data-bs-container="body"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="Top popover">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </button>
                                                                @elseif ($result->score_number == 2)
                                                                    <label
                                                                        onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                                        class="btn score-priority"
                                                                        style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                                    </label>
                                                                    <button type="button" class="btn"
                                                                            data-bs-container="body"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="Top popover">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </button>
                                                                @elseif ($result->score_number == 3)
                                                                    <label
                                                                        onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                                        class="btn score-priority"
                                                                        style="background-color: #022D02; border: 3px solid #022D02; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                                    </label>
                                                                    <button type="button" class="btn"
                                                                            data-bs-container="body"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="Top popover">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </button>
                                                                @elseif ($result->score_number == 0)
                                                                    <label
                                                                        onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                                        class="btn score-priority"
                                                                        style="background-color: #FCD40A; border: 3px solid #FCD40A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                                    </label>
                                                                    <button type="button" class="btn"
                                                                            data-bs-container="body"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="Top popover">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </button>
                                                                @elseif ($result->score_number == 5)
                                                                    <label
                                                                        onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                                        class="btn score-priority"
                                                                        style="background-color: #138D07; border: 3px solid #138D07; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                                    </label>
                                                                    <button type="button" class="btn"
                                                                            data-bs-container="body"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="Top popover">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </button>
                                                                @elseif ($result->score_number == -1)
                                                                    <label
                                                                        onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                                        class="btn score-priority"
                                                                        style="background-color: #F56A21; border: 3px solid #F56A21; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                                    </label>
                                                                    <button type="button" class="btn"
                                                                            data-bs-container="body"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="Top popover">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </button>
                                                                @elseif ($result->score_number == -2)
                                                                    <label
                                                                        onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                                        class="btn score-priority"
                                                                        style="background-color: #FC0A0A; border: 3px solid #FC0A0A; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                                    </label>
                                                                    <button type="button" class="btn"
                                                                            data-bs-container="body"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="Top popover">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </button>
                                                                @elseif ($result->score_number == -3)
                                                                    <label
                                                                        onclick="editScoreModal('{{ $result->id }}', {{ $user->id }})"
                                                                        class="btn score-priority"
                                                                        style="background-color: #5E0303; border: 3px solid #5E0303; width: 100%; height: 40px; font-size: 14px; color: #fff; font-weight: bold; ">

                                                                    </label>
                                                                    <button type="button" class="btn"
                                                                            data-bs-container="body"
                                                                            data-bs-toggle="popover"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="Top popover">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </button>
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
                            <span class="fw-bold">Subject Name</span>
                            <input style="border: none;" readonly type="text" id="sub_name">
                        </div>
                        <div class="col">
                            <span class="fw-bold">Applicant Name</span>
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
                                    <option
                                        value="{{ $score }}" {{ (old("score_give") == $score ? "selected" : "") }}>{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <textarea name="note" class="form-control @error('note') is-invalid @enderror"
                                      placeholder="Write your notes... (Optional)">{{ old("note") }}</textarea>
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


{{--Button Info message--}}

<div class="modal fade" id="info_msg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{--                <h5 class="display-6 text-center heading_txt" id="edit_score_heading">Create A Score</h5>--}}
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
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
            url: "{{ url('edit/score') }}",
            type: 'GET',
            cache: false,
            data: {'s': s, '_token': $_token, 'v': v}, //see the $_token
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


<script>
    function show_info_modal(key) {
        event.preventDefault();
        if (key == 'add_app') {
            $("#info_msg").modal("show");
            $("#info_msg_body_html").html(`Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. `);
        }
    }
</script>

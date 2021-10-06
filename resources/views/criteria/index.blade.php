@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
                <h2 class="display-4 text-center heading_txt">Create A Criteria</h2>
                <p class="display-6 fw-bold text-center">{{ $mainsubjectname->main_subject_name }}</p>
                <h5 style="margin-top: -5px;"
                    class="display-7 text-center heading_txt">{{ $subjects->subject_name }}</h5>
                {{--            <p class="text-center"><a class="btn btn-info btn-sm" href="#" onclick="openMainSubjectModal()">Add Main Criteria</a></p>--}}


                <div class="box mt-4">
                    <form action="{{ route('criteria.store') }}" method="post">
                        @csrf

                        <div class="form-group mb-4">
                            <input required type="hidden" name="subject" value="{{ $subjects->id }}">
                            {{--                        <select class="form-control @error('subject') is-invalid @enderror" name="subject" style="font-weight: bold;">--}}
                            {{--                            <option value="{{ $subjects->id }}" {{ (old("subject") == $subjects->id ? "selected" : "") }}>{{ $subjects->subject_name }}</option>--}}
                            {{--                        </select>--}}
                            @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <select name="main" class="form-control @error('main') is-invalid @enderror"
                                    onchange="openMainSubjectModal(this.value)">
                                <option selected disabled value="">Choose The Main Criteria</option>
                                @foreach ($maincriterias as $main)
                                    <option
                                        {{ (old("main") == $main->id ? "selected" : "") }} value="{{$main->id}}">{{$main->criteria_name}}</option>
                                @endforeach
                                <optgroup>
                                    <option style="background-color: green; color: #fff;" value="add_new_criteria7">Add New Main Criteria</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" name="criteria"
                                   class="form-control @error('criteria') is-invalid @enderror"
                                   placeholder="Create Part Of Criteria (i.e. Employment History, etc)"
                                   value="{{ old('criteria') }}">
                            @error('criteria')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <select class="form-control @error('priority') is-invalid @enderror" name="priority">
                                <option selected value="" disabled>Minimum Score</option>
                                @foreach ($priorites_array as $priority_array => $value)
                                    <option
                                        value="{{ $value }}" {{ (old("priority") == $value ? "selected" : "") }}>{{ $priority_array }}</option>
                                @endforeach
                            </select>
                            @error('priority')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Color checkbox for priority --}}
                        {{-- <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" onchange="selectedColorBox('b_red', 'btncheck1')" value="1">
                            <label id="b_red" class="btn red-bg" for="btncheck1">1</label>

                            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" onchange="selectedColorBox('b_yellow', 'btncheck2')" value="2">
                            <label id="b_yellow" class="btn yellow-bg" for="btncheck2">2</label>

                            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" onchange="selectedColorBox('b_orange','btncheck3')" value="3">
                            <label id="b_orange" class="btn orange-bg" for="btncheck3">3</label>

                            <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off" onchange="selectedColorBox('b_light_green','btncheck4')" value="4">
                            <label id="b_light_green" class="btn light-green-bg" for="btncheck4">4</label>

                            <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off" onchange="selectedColorBox('b_dark_green', 'btncheck5')" value="5">
                            <label id="b_dark_green" class="btn dark-green-bg" for="btncheck5">5</label>
                          </div> --}}

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-dark btn-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
    </div>
</div>


@include('layouts.footer')

<div class="modal fade" id="main_criteria_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="display-6 text-center heading_txt" id="edit_score_heading">Add Main Criteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('maincriteria.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="hd_sub_id" value="{{$sid}}">
                    <div class="box">
                        <div class="form-group">
                            <input type="text" class="form-control" required name="main_sub"
                                   placeholder="Create a Main Criteria">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<script>
    function openMainSubjectModal(str) {
        if (str == "add_new_criteria7") {
            $("#main_criteria_modal").modal("show");
        }

    }
</script>

<script>
    function selectedColorBox(e, f) {
        if (document.getElementById(f).checked) {
            document.getElementById(e).style.width = "100%"
        } else {
            document.getElementById(e).style.width = "50px"
        }
    }
</script>

@include('layouts.header', ['title' => 'Subject'])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
            <h2 class="display-4 text-center heading_txt">Add A Buyer

                <i
                    style="text-align: center !important; font-size: 14px;"
                    data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="top" data-bs-content="Subjects are a way to organize where Applicants will be added within your Scorng account. A Subject is broken into two parts, a Main Subject and a Sub Subject. For example, the Main Subject can be something like the store or location where the new Applicant for which you’re hiring, will be working. For example the Sub Subject can be the actual position for which you’re hiring." class="fas fa-info-circle"></i>

            </h2>
            <div class="box mt-6">
                <form action="{{ route('subject.store') }}" method="post">
                    @csrf
{{--                    <div class="form-group mb-3">--}}
{{--                        <select name="main[]" class="form-control @error('main') is-invalid @enderror" onchange="openMainSubjectModal(this.value)">--}}
{{--                            <option selected disabled value="">Choose The Main Client</option>--}}
{{--                            @foreach ($mainsubjects as $main)--}}
{{--                               <option {{ (old("main") == $main->id ? "selected" : "") }} value="{{$main->id}}">{{$main->main_subject_name}}</option>--}}
{{--                            @endforeach--}}
{{--                            <optgroup>--}}
{{--                                <option style="background-color: green; color: #fff;" value="add_new_criteria7">Add New Main Client</option>--}}
{{--                            </optgroup>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="form-group mb-3">
                        <input autocomplete="off" type="text" name="subject[]" class="form-control @error('subject') is-invalid @enderror" placeholder="Buyer's Name" value="{{ old('subject') }}">
                    </div>

                    <div class="form-group mb-3">
                        <input autocomplete="off" type="email" name="mailid[]" class="form-control @error('mailid') is-invalid @enderror" placeholder="Buyer's Email" value="{{ old('mailid') }}">
                    </div>

                    <hr />

                    <div id="html"></div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button type="button" onclick="add_more()" class="btn btn-dark btn-md">Add Another Buyer</button>
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



  <div class="modal fade" id="main_subject_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="display-6 text-center heading_txt" id="edit_score_heading">Add Main Subject</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('mainsubject.store') }}" method="post">
                @csrf
                <div class="box">
                    <div class="form-group">
                        <input type="text" class="form-control" required name="main_sub" placeholder="Create a Main Client">
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
            $("#main_subject_modal").modal("show");
        }

    }

    function add_more() {
        $("#html").append(`
        <div class="form-group mb-3">
                        <input autocomplete="off" type="text" name="subject[]" class="form-control @error('subject') is-invalid @enderror" placeholder="Buyer's Name" value="{{ old('subject') }}">
                    </div>

                    <div class="form-group mb-3">
                        <input autocomplete="off" type="email" name="mailid[]" class="form-control @error('mailid') is-invalid @enderror" placeholder="Buyer's Email" value="{{ old('mailid') }}">
                    </div>
         <hr />`);
    }
</script>

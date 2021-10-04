@include('layouts.header', ['title' => 'Subject'])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
            <h2 class="display-4 text-center heading_txt">Create A Subject</h2>
            <p class="text-center"><a class="btn btn-info btn-sm" href="#" onclick="openMainSubjectModal()">Add Main Subject</a></p>
            <div class="box mt-6">
                <form action="{{ route('subject.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <select name="main" class="form-control @error('main') is-invalid @enderror">
                            <option selected disabled value="">Choose The Main Subject</option>
                            @foreach ($mainsubjects as $main)
                               <option {{ (old("main") == $main->id ? "selected" : "") }} value="{{$main->id}}">{{$main->main_subject_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <input autocomplete="off" type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Create a subject (i.e. address of rental property or job posting)" value="{{ old('subject') }}">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button type="submit" class="btn btn-dark btn-md">Add Another Subject</button>
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
                        <input type="text" class="form-control" required name="main_sub" placeholder="Create a Main Subject">
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
    function openMainSubjectModal() {
        $("#main_subject_modal").modal("show");
    }
</script>

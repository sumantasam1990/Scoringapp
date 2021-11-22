@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
                <h2 class="display-4 text-center heading_txt">Add A Property

                    <i
                        style="text-align: center !important; font-size: 14px;"
                        data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top" data-bs-content="This is how Agents and Buyers can add a Property to their Scorng account and to a Score Page. On A Score Page, simply click the “Add Property” button and open the page to enter in the Property Address, the Listing Link and any notes or files that you want to add." class="fas fa-info-circle"></i>

                </h2>
{{--                <h6 style="margin-top: -5px;" class="display-7 text-center heading_txt">Add simple things like the name,--}}
{{--                    photo, email and phone number.</h6>--}}
{{--                <p class="display-6 text-center heading_txt">{{ $mainsubjectname->main_subject_name }}</p>--}}
{{--                <p style="margin-top: -1px;" class="fs-4 text-center heading_txt">{{$subjects->subject_name}}</p>--}}
                <p style="margin-top: -1px;" class="fs-4 text-center heading_txt">Add the property's address the below</p>
                <div class="box mt-4">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('applicant.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <input required type="hidden" name="sub_id" value="{{ $subjects->id  }}">
{{--                            <select class="form-control @error('sub_id') is-invalid @enderror" name="sub_id"--}}
{{--                                    style="font-weight: bold;">--}}
{{--                                <option--}}
{{--                                    value="{{ $subjects->id  }}" {{ (old("sub_id") == $subjects->id ? "selected" : "") }}>{{ $subjects->subject_name }}</option>--}}
{{--                            </select>--}}
                        </div>

                        @livewire('existingapplicants')


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button onclick="selectPhoto()" type="button" class="btn btn-dark btn-md" id="add_photo">
                                <i class="fas fa-camera"></i> Add Photo
                            </button>
                            <button type="submit" class="btn btn-dark btn-md">Submit</button>
                        </div>
                        <input style="display: none;" type="file" id="imgInp" name="image" class="form-control">

                        <p class="mt-4 fw-bold previe_w" style="display: none;">Preview</p>
                        <img id="blah" class="img-fluid img-thumbnail previe_w" style="display: none;" src="#" alt="preview" />

                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
    </div>
</div>


@include('layouts.footer')

<script>
    function selectPhoto() {
        $("#imgInp").trigger('click');
    }

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            $(".previe_w").show();
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

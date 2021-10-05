@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
            <h2 class="display-4 text-center heading_txt">Create An Applicant</h2>
            <h6 style="margin-top: -5px;" class="display-7 text-center heading_txt">Add simple things like the name, photo, email and phone number.</h6>
            <p style="margin-top: -1px;" class="display-7 text-center heading_txt">{{$subjects->subject_name}}</p>
            <div class="box mt-6">
                <form action="{{ route('applicant.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        {{-- <select class="form-control" name="sub_id">
                            <option selected value="" disabled>Which Subject Are You Adding The Applicant To?</option>
                            @foreach ($subjects as $sub)
                                <option value="{{ $sub->id  }}">{{ $sub->subject_name }}</option>
                            @endforeach
                        </select> --}}
                        <select class="form-control @error('sub_id') is-invalid @enderror" name="sub_id" style="font-weight: bold;">
                            <option value="{{ $subjects->id  }}" {{ (old("sub_id") == $subjects->id ? "selected" : "") }}>{{ $subjects->subject_name }}</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <input required type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Applicant's Name" autocomplete="off">
                    </div>
                    <div class="form-group mb-4">
                        <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Applicant's Email ID" autocomplete="offf">
                    </div>
                    <div class="form-group mb-4">
                        <input required type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Applicant's Phone/Mobile" autocomplete="offff">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button onclick="selectPhoto()" type="button" class="btn btn-dark btn-md" id="add_photo">Add Photo</button>
                        <button type="submit" class="btn btn-dark btn-md">Submit</button>
                    </div>
                    <input style="display: none;" type="file" id="img" name="image" class="form-control">
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
    $("#img").trigger('click');
}
</script>

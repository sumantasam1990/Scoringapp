@include('layouts.header', ['title' => 'Subject'])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
            <h2 class="display-4 text-center heading_txt">Create A Subject</h2>
            <div class="box mt-6">
                <form action="{{ route('subject.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input required autocomplete="off" type="text" name="subject" class="form-control" placeholder="Create a subject (i.e. address of rental property or job posting)">
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


@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
                <h2 class="display-4 text-center heading_txt">Questionnaire

                    <i
                        style="text-align: center !important; font-size: 14px;"
                        data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top" data-bs-content="This is the questionnaire that buyers will use to share what they’re looking for in a house. Buyers can create a criteria such as square footage or number of rooms and a priority for that criteria. This way both buyer’s agents and listing agents know exactly what a buyer is looking for in a house.
" class="fas fa-info-circle"></i>

                </h2>
                {{--                <p class="display-6 fw-bold text-center">{{ $mainsubjectname->main_subject_name }}</p>--}}
                <h5 style="margin-top: -5px;"
                    class="display-7 text-center heading_txt">
                    Please add details about the property that you're looking for.
                </h5>


                <div class="box mt-4">

                    <div class="mb-4 border-1 border-bottom pb-2">
                        @foreach($data as $d)
                            <h4 class="fs-5 fw-bold">{{ $d->criteria_name }}</h4>
                            <h6 class="fs-6 fw-light">{{ $d->priority }}</h6>
                        @endforeach

                        <div class="mt-4">
                            {{ $data->links() }}
                        </div>


                    </div>

                    @role('buyer')
                    <form action="{{ route('questionnaire.post') }}" method="post">
                        @csrf
                        <input type="hidden" name="subid" value="{{ $subid }}">
                        <div class="form-group">
                            <input type="text" name="criteria" class="form-control" placeholder="Enter A Criteria (i.e. the desired square footage that you're looking for in a house)">
                        </div>
                        <div class="form-group mt-4">
                            <input type="text" name="priority" class="form-control" placeholder="Choose The Priority For The Above Criteria">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
{{--                            <button type="button" onclick="selectPhoto()" class="btn btn-dark btn-md"> Add Another Criteria</button>--}}
                            <button type="submit" class="btn btn-dark btn-md">Submit</button>
                        </div>
                    </form>
                    @endrole
                </div>




            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
    </div>
</div>

@include('layouts.footer')

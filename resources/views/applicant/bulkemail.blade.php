@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">
            <div class="">
                <p class="display-6 heading_txt">{{ $mainsubjectname->main_subject_name }}</p>
                <p style="margin-top: -1px;" class="display-7 heading_txt">{{$subjects->subject_name}}</p>

                <div @class("row")>
                    <div @class("col-md-6")>
                        <h4 class="display-7 heading_txt">Email List


                            <i
                                style="text-align: center !important; font-size: 14px;"
                                data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="top" data-bs-content="The Bulk Email List allows you to add any applicants who weren’t chosen but you would still like to easily have access to their email address in case you have future job openings. This way you can easily download multiple emails in one click and email applicants that you have already scored, a link to a new job posting." class="fas fa-info-circle"></i>

                        </h4>
                    </div>
                    <div @class("col-md-6") style="float:right;">
                        <form action="{{ route("export-emails") }}" method="post" style="float:right;">
                            @csrf
                            <input type="hidden" name="hd_sub_id" value="{{$subjects->id}}">
                            <button type="submit" @class('btn btn-dark btn-sm')>Download Email List</button>
                        </form>

                    </div>
                </div>


                <div @class("table-responsive mt-6")>

                    <table @class("table table-striped")>
                        <thead>
                        <tr>
                            <th>Remove Applicant</th>
                            <th>Applicant Name</th>
                            <th>Applicant Email</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($applicants as $applicant)
                        <tr>
                            <td>
                                <form action="{{ route('remove.bulk') }}" method="post" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    <input required type="hidden" name="hd_sub_id" value="{{ $applicant->id }}">
                                    <button type="submit" @class('btn btn-outline-danger btn-sm')><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td><a class="text-dark" href="/applicant/{{ $applicant->applid }}/{{ $subjects->id }}"> {{ $applicant->name }}</a> </td>
                            <td>{{ $applicant->email }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
    </div>
</div>


@include('layouts.footer')

<script>

</script>

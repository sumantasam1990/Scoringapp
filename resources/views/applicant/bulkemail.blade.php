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
                        <h4 class="display-7 heading_txt">Email List</h4>
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
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="" value="">
                                    <button type="submit" @class('btn btn-outline-danger btn-sm')><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td>{{ $applicant->name }}</td>
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

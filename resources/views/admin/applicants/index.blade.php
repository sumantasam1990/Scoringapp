@include('admin.layouts.header', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>All Applicants</h1>
            <hr>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <table id="scorng-tbl" class="display table table-bordered table-flush table-striped">
                <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Phone</th>
                    <th>Joining Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applicants as $applicant)
                    <tr>
                        <td>{{ $applicant->name }}</td>
                        <td>{{ $applicant->email }}</td>
                        <td>{{ $applicant->phone }}</td>
                        <td>{{ date('d/m/Y h:i A', strtotime($applicant->created_at)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.layouts.footer')

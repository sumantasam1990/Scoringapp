@include('admin.layouts.header', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>All Users</h1>
            <h5>All Registered Companies/Users</h5>
            <hr>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <table id="scorng-tbl" class="display table table-bordered table-flush table-striped">
                <thead>
                <tr>
                    <th>User Type</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Email Verified</th>
                    <th>Joining Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->user_type }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at != '' ? 'verified' : 'Not verified' }}</td>
                    <td>{{ date('d/m/Y h:i A', strtotime($user->created_at)) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.layouts.footer')

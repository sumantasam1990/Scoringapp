@include('layouts.header', ['title' => 'Reset Your Password'])

<div class="container mt-6">

    @include('layouts.alert')
    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="{{ route('password.update') }}" method="post">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label class="fw-bold mb-3">Enter Your Registered Email Address</label>
                    <input type="email" required name="email" class="form-control"
                           placeholder="Your Registered Email ID">
                </div>

                <div class="form-group">
                    <label class="fw-bold mb-3">Enter Your New Password</label>
                    <input type="password" required name="password" class="form-control"
                           placeholder="Your Registered Email ID">
                </div>

                <div class="form-group">
                    <label class="fw-bold mb-3">Confirm Password</label>
                    <input type="password" required name="password_confirmation" class="form-control"
                           placeholder="Your Registered Email ID">
                </div>
                <button type="submit" class="btn btn-dark mt-4">Submit</button>
            </form>
        </div>


        <div class="col-md-3"></div>

    </div>
</div>


@include('layouts.footer')

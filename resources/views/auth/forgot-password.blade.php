@include('layouts.header', ['title' => 'Forgot Password'])

<div class="container mt-4">

    @include('layouts.alert')
    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="" method="post">
                @csrf

                <div class="form-group">
                    <p class="fw-bold mb-3">Enter Your Registered Email Address</p>
                    <input type="email" required name="email" class="form-control"
                           placeholder="Your Registered Email ID">
                </div>
                <button type="submit" class="btn btn-dark mt-4">Submit</button>
            </form>
        </div>


        <div class="col-md-3"></div>

    </div>
</div>


@include('layouts.footer')

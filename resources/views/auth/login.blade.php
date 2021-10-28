@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">

        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 mx-auto">
            <div class="">
            <h2 class="display-4 text-center heading_txt">Login</h2>

                <div class="box">
                    <form action="{{ route('login.custom') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <input type="email" placeholder="Email" id="email_address" class="form-control" name="email" required autofocus autocomplete="off">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required autocomplete="offf">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

{{--                        <div class="form-group mb-3">--}}
{{--                            <div class="checkbox">--}}
{{--                                <label><input type="checkbox" name="remember"> Remember Me</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Log in</button>
                            <a class="btn text-dark text-decoration-underline  p-4" href="/forgot-password">Forgot Password?</a>
                            <a class="btn mt-3 fw-bold" href="/signup">Don't Have An Account? Create Your Free Account</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



@include('layouts.footer')

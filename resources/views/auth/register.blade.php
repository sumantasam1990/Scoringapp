@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div class="">
            <h2 class="display-4 text-center heading_txt">Sign Up For Scorng</h2>
                <h6 class="text-center fs-5 fw-normal">7 Day Free Trial, No Credit Card Required.</h6>

                <div class="box">
                    <form action="{{ route('register.custom') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Name" id="name" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="email" placeholder="Email" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" {{ old('password') }} required autocomplete="offf">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" placeholder="Confirm Password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="offf">
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="form-check mb-3">
                            <input required class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <p class="form-check-label" for="flexCheckDefault">
                                I agree with the <a class="text-dark text-decoration-underline" target="_blank" href="/terms">terms & conditions</a>.
                            </p>
                        </div>


                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                            <a class="btn text-dark text-decoration-underline fw-bold mt-3" href="/login">Already Have An Account? Login</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

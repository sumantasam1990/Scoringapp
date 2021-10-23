@include('layouts.header', ['title' => $title])

<div class="container mt-4">
    @include('layouts.alert')
    <div class="row">
        <div class="col-12">
            <h1 class="display-4 fw-bold text-center">Friendly Folks, Standing By.</h1>
            <h5 class="text-center">We guarantee that we will respond to you within 24 hours (Mon-Fri 8a - 6p, U.S. ET).</h5>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="box mt-3">
                        <form action="{{ route('contact.us') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input class="form-control" type="email" required name="email" placeholder="Your Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" required name="phone" placeholder="Your Phone Number">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" required name="nam_e" placeholder="Your Name">
                            </div>
                            <div class="form-group mb-3">
                                <textarea name="msg" rows="6" placeholder="What Can We Help You With?" class="form-control"></textarea>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button type="submit" class="btn btn-dark btn-md">Send</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>






        </div>
    </div>
</div>






@include('layouts.footer')

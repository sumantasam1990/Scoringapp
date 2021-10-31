@include('layouts.header', ['title' => $title])

<div class="container mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold">How To Get Started.</h1>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="box-black-howitworks text-center">
                        <h4 class="display-6 fw-bold">I'm A Realtor</h4>
                        <p @class('mt-4')><a class="btn btn-dark" href="/sign-up-my-company">Learn More</a></p>
                    </div>

                    <div class="box-black-howitworks text-center mt-4">
                        <h4 class="display-6 fw-bold">I'm A Buyer</h4>
                        <p @class('mt-4')><a class="btn btn-dark" href="/invited-to-join">Learn More</a></p>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>






@include('layouts.footer')

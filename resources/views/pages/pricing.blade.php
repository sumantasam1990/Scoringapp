@include('layouts.header', ['title' => $title])

<div class="container mt-6 mb-4">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold">Our Prices</h1>
            <h5>But, these prices are for a limited time only.</h5>
            <div class="row mt-6">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4 mt-4">
                            <div class="box-black-howitworks text-center">
                                <h4 class="display-4 fw-bold">$99</h4>
                                <p class="m-0 fw-bold">Annually</p>
                                <div class="m-0">
                                    <p class="m-2 fw-bold fs-6">Up to 500 Applicants</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Criteria</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Scoreboards</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Score Pages</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Email Lists</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Message Rooms</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Team Members</p>
                                </div>

                                <p @class('mt-4')><a class="btn btn-dark" href="/registration">Sign Up Now</a></p>
                            </div>


                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="box-black-howitworks text-center">
                                <h4 class="display-4 fw-bold">$199</h4>
                                <p class="m-0 fw-bold">Annually</p>
                                <div class="m-0">
                                    <p class="m-2 fw-bold fs-6">Up to 2,00 Applicants</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Criteria</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Scoreboards</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Score Pages</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Email Lists</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Message Rooms</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Team Members</p>
                                </div>

                                <p @class('mt-4')><a class="btn btn-dark" href="/registration">Sign Up Now</a></p>
                            </div>


                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="box-black-howitworks text-center">
                                <h4 style="font-size: 45px;" class=" fw-bold">Contact <br /> Sales</h4>

                                <div class="m-0">
                                    <p class="m-2 fw-bold fs-6">Unlimited Applicants</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Criteria</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Scoreboards</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Score Pages</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Email Lists</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Message Rooms</p>
                                    <p class="m-2 fw-bold fs-6">Unlimited Team Members</p>
                                </div>

                                <p @class('mt-4')><a class="btn btn-dark" href="/registration">Sign Up Now</a></p>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>






@include('layouts.footer')

@include('layouts.header', ['title' => $title])

<div class="container mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold mb-4">How To Get Started.</h1>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="box-black-howitworks text-center">
                        <h4 class="display-6 fw-bold">I'm A Buyer's Agent</h4>
                        <p @class('mt-4')><a class="btn btn-dark" href="{{ route('howitworkbuyeragent') }}">Learn More</a></p>
                    </div>

                    <div class="box-black-howitworks text-center mt-4">
                        <h4 class="display-6 fw-bold">I'm A Listing Agent</h4>
                        <p @class('mt-4')><a class="btn btn-dark" href="{{ route('listingagenthowitworks') }}">Learn More</a></p>
                    </div>

                    <div class="box-black-howitworks text-center mt-4">
                        <h4 class="display-6 fw-bold">I'm A Buyer</h4>
                        <p @class('mt-4')><a class="btn btn-dark" href="{{ route('howitworksbuyer') }}">Learn More</a></p>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>






@include('layouts.footer')

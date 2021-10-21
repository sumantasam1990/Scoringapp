@include('layouts.header', ['title' => $title])

<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-12">
            <h1 class="display-4 fw-bold text-center">Scorng Policies, Terms, <br >and Legal Stuff.</h1>

            <ul class="text-left mt-6">
                <li class="mt-3">
                    <a class="text-dark fw-bold fs-4" href="/privacy">Privacy Policy</a>
                </li>
                <li class="mt-3">
                    <a class="text-dark fw-bold fs-4" href="/terms">Terms Of Service</a>
                </li>
                <li class="mt-3">
                    <a class="text-dark fw-bold fs-4" href="/privacy-regulation">Privacy Regulation Reference</a>
                </li>
                <li class="mt-3">
                    <a class="text-dark fw-bold fs-4" href="/cancellation-policy">Cancellation Policy</a>
                </li>
                <li class="mt-3">
                    <a class="text-dark fw-bold fs-4" href="/refund">Refund Policy</a>
                </li>
{{--                <li class="mt-3">--}}
{{--                    <a class="text-dark fw-bold fs-4" href="">Use Restriction Policy</a>--}}
{{--                </li>--}}
                <li class="mt-3">
                    <a class="text-dark fw-bold fs-4" href="/security">Security Overview</a>
                </li>
{{--                <li class="mt-3">--}}
{{--                    <a class="text-dark fw-bold fs-4" href="">Account Ownership</a>--}}
{{--                </li>--}}
            </ul>

        </div>
    </div>
</div>






@include('layouts.footer')

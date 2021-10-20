<div class="container-fluid footer mt-6">
    <footer class="container text-left mt-6">
        <div class="row">
            <div class="col-md-1 col-12"></div>
            <div class="col-md-3 col-12 mb-4">
                <img src="{{ asset('images/logo.webp') }}">
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0">Scorng</p>
                <ul>
                    <li>
                        <a href="/pricing">Pricing</a>
                    </li>
                    <li>
                        <a href="/registration">Sign Up</a>
                    </li>
                    <li>
                        <a href="/login">Login</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0">Support</p>
                <ul>
                    <li>
                        <a href="/about">About Us</a>
                    </li>
                    <li>
                        <a href="/howitworks">How It Works</a>
                    </li>
                    <li>
                        <a href="/features">Features</a>
                    </li>
                    <li>
                        <a href="/faq">FAQs</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0">Get In Touch</p>
                <ul>
                    <li>
                        <a href="/contact">Message Us</a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="">Facebook</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="">Twitter</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="">Instagram</a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0">Legal</p>
                <ul>
                    <li>
                        <a href="/legal">Legal Stuff</a>
                    </li>


                    <li>
                        <a style="cursor: inherit" href="javascript:void(0)" nofollow>&copy; 2021</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

</div>



{{--mobile message--}}

<div class="modal fade" id="mob_message" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-headerr">
                {{--                <h5 class="display-6 text-center heading_txt" id="edit_score_heading">Create A Score</h5>--}}
                <button style="float: right; margin: 10px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h4 class="fw-bold fs-3">Please use the desktop version.</h4>

                <p class="fs-6 mt-4">We HIGHLY recommend using the DESKTOP version of Scorng for a much better experience. The desktop version is much better designed and you can also see and consume much more of the important information on Score Pages and Scoreboards, more easily.</p>

            </div>
        </div>
    </div>
</div>








<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

<script src="{{ asset('js/bootstrap.js') }}"></script>

<script>
    $(function () {
        $('[data-bs-toggle="popover"]').popover()
    })

    $('body').on('click', function (e) {
        $('[data-bs-toggle=popover]').each(function () {
            // hide any open popovers when the anywhere else in the body is clicked
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });

    if ($(window).width() < 700) {
        $(document).ready(function () {
            $("#mob_message").modal('show');
        })
    }


</script>


@livewireScripts

</body>
</html>

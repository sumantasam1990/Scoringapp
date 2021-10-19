<div class="container-fluid footer">
    <footer class="container text-left mt-6">
        <div class="row">
            <div class="col-md-1 col-12"></div>
            <div class="col-md-3 col-12 mb-4">
                <img src="{{ asset('images/logo.webp') }}">
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold">Scorng</p>
                <ul>
                    <li>
                        <a href="">Pricing</a>
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
                <p class="fw-bold">Support</p>
                <ul>
                    <li>
                        <a href="">About Us</a>
                    </li>
                    <li>
                        <a href="">How It Works</a>
                    </li>
                    <li>
                        <a href="">Features</a>
                    </li>
                    <li>
                        <a href="">FAQs</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold">Get In Touch</p>
                <ul>
                    <li>
                        <a href="">Message Us</a>
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
                <p class="fw-bold">Legal</p>
                <ul>
                    <li>
                        <a href="/legal">Legal Stuff</a>
                    </li>
                    <li>
                        &nbsp;
                    </li>

                    <li>
                        <a href="#" nofollow>&copy; 2021 .</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

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
</script>


@livewireScripts

</body>
</html>

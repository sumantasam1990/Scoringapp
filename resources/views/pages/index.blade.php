@include('layouts.header', ['title' => $title])

<div class="container home mt-4">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="text-center mt-4">
                <h1 class="display-3 fw-bolder">A scoring system that enables
                    you to hire the best applicant.</h1>
                <p class="fw-bold mt-3 text-center subheading">A scoring system is objectively the most effective and efficient way to choose the most qualified applicant.</p>
                <a class="btn btn-info btn-lg mt-4" href="/signup">Sign Up Now</a>
                <p class="mt-3">No long-term commitment, one time annual payment.</p>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<div class="container text-center mt-4 container-home">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/clipboard.webp') }}" style="width: 80px; ">
            <h4 class="fw-bold mt-4 fs-2">Comprehensive</h4>
            <p class="mt-3">
                Allow each member of your executive team to comprehensively score each applicant on limitless criteria and hear their thoughts. For each criteria, provide a score from -3 to +3 to each applicant based on whether they met your expectations, failed or exceeded your expectations. Each Score Page is color coded with 7 very different colors. Our score page automatically adds up the individual score that you gave for each criteria to each applicant.
            </p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/scoreboard.webp') }}" style="width: 100px; margin-top: 38px; ">
            <h4 class="fw-bold mt-4 fs-2">Scoreboard</h4>
            <p class="mt-3">
                This is the most important feature. Scoreboard allows you to get a clear overview of how you scored each applicant on each criteria against how many times they met your expectations, exceed or failed your expectations and by how much they exceeded or failed to exceed your expectations. This allows you to measure an applicant on a much more in depth way.            </p>
        </div>
    </div>
</div>


<div class="container ">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <h2 class="cta-text">
                Choosing the applicant who isn't the best qualified can cost your business thousands and waste weeks and months of your time. With Scorng, you can get a super comprehensive detailed overview of each applicant in one single view while discussing with the hiring team.
            </h2>
        </div>
    </div>
</div>


<div class="container-fluid cta-sky container-home mt-6">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="fw-bold display-5">Your Expectations.</h4>
                <p>View whether an applicant met your expectations, exceeded or failed to met or exceed your <br/> expectations, by how much and how many times.</p>
                <a style="color: #0CABA8;" class="btn btn-light btn-lg fw-bold mt-4" href="/signup">Sign Up Today</a>
            </div>
        </div>
    </div>
</div>


<div class="container mt-6 container-home">
    <div class="row">
        <div class="col-12 text-center">
            <h4 class="fw-bold display-4">One Simple Price</h4>
            <p>Month-to-Month. No long term commitment </p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
{{--            <div class="box-black text-center">--}}
{{--                <h4 class="display-4 fw-bold">$99</h4>--}}
{{--                <p class="fw-bold">Monthly</p>--}}
{{--                <div class="m-0">--}}
{{--                    <p class="m-2 fw-bold fs-6">Up to 500 Applicants</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Criteria</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Scoreboards</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Score Pages</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Email Lists</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Message Rooms</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Team Members</p>--}}
{{--                </div>--}}
{{--                <a class="btn btn-dark mt-4" href="/registration">Sign Up Now</a>--}}
{{--            </div>--}}
        </div>
        <div class="col-md-4 mb-3">
            <div class="box-black text-center">
                <h4 class="display-4 fw-bold">$29</h4>
                <p class="fw-bold">Monthly</p>
                <div class="m-0">
                    <p class="m-2 fw-bold fs-6">Unlimited Applicants</p>
                    <p class="m-2 fw-bold fs-6">Unlimited Criteria</p>
                    <p class="m-2 fw-bold fs-6">Unlimited Scoreboards</p>
                    <p class="m-2 fw-bold fs-6">Unlimited Score Pages</p>
                    <p class="m-2 fw-bold fs-6">Unlimited Email Lists</p>
                    <p class="m-2 fw-bold fs-6">Unlimited Message Rooms</p>
                    <p class="m-2 fw-bold fs-6">Unlimited Team Members</p>
                </div>
                <a class="btn btn-dark mt-4" href="/signup">Sign Up Now</a>
            </div>
        </div>
        <div class="col-md-4 mb-3">
{{--            <div class="box-black text-center">--}}
{{--                <h4 class="display-5 fw-bold">Contact <br> Sales</h4>--}}
{{--                <div class="m-0">--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Applicants</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Criteria</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Scoreboards</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Score Pages</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Email Lists</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Message Rooms</p>--}}
{{--                    <p class="m-2 fw-bold fs-6">Unlimited Team Members</p>--}}
{{--                </div>--}}

{{--                <a class="btn btn-dark mt-4" href="/registration">Sign Up Now</a>--}}
{{--            </div>--}}
        </div>
    </div>
</div>


<div class="container-fluid cta-red mt-6 container-home">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="fw-bold display-5">Applicant Profiles.</h4>
                <p>Keep any files, notes and more for each applicant in their profile. One-click accessibility.</p>
                <a style="color: #FF3F3F;" class="btn btn-light btn-lg fw-bold mt-4" href="/signup">Sign Up Today</a>
            </div>
        </div>
    </div>
</div>


<div class="container text-center mt-6 container-home">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/chat.webp') }}" style="width: 80px; ">
            <h4 class="fw-bold mt-4">Threaded Message Rooms</h4>
            <p class="mt-3">
                Discuss each applicant and the criteria in detail with your team and hear everyone's opinion. Each Score Page will have unlimited Message Rooms. Each Team Member will receive an email notification of every new posted message.            </p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/infinity (1).webp') }}" style="width: 100px; margin-top: 30px; ">
            <h4 class="fw-bold mt-4">Limitless Details</h4>
            <p class="mt-3">
                Add as many super detailed criteria as possible so that the final score gives you the most detailed assessment of each applicant.        </div>
    </div>
</div>


<div class="container-fluid cta-violet mt-6 container-home">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="fw-bold display-5">Bulk, One-Click Email</h4>
                <p>We have super powerful features in the works that will help you choose the best possible applicant.</p>
                <a style="color: #370143;" class="btn btn-light btn-lg fw-bold mt-4" href="/signup">Sign Up Today</a>
            </div>
        </div>
    </div>
</div>


<div class="container text-center mt-4 container-home">
    <div class="row">
        <div class="col-md-6 mt-4">
            <img src="{{ asset('images/team.webp') }}" style="width: 80px; ">
            <h4 class="fw-bold mt-4">Team Members</h4>
            <p class="mt-3">
                Invite as many other Team Members as possible so you can always get many other scores based on other's opinions of each applicant. This will ultimately help you give the most accurate or deserving score to each applicant, which will help you hire the most qualified applicant.
        </div>
        <div class="col-md-6 mt-md-2 mt-4">
            <img src="{{ asset('images/star (1).webp') }}" style="width: 80px; ">
            <h4 class="fw-bold mt-4">Best Score</h4>
            <p class="mt-3">
                Scores are always displayed from best to worst according to the main Team Member's score given but you can always see the scores that other user's have given to the same Applicant right below.
        </div>
        <div class="col-md-6 mt-4">
            <img src="{{ asset('images/medal.webp') }}" style="width: 80px; ">
            <h4 class="fw-bold mt-4">Finalists Page</h4>
            <p class="mt-3">
                Add Applicant's who you believe will make the cut, to one single page. This will allow you to more easily concentrate on the ones who you believe have what it takes to be hired.            </p>
        </div>
        <div class="col-md-6 mt-4">
            <img src="{{ asset('images/dashboard.webp') }}" style="width: 80px; margin-top: 20px; ">
            <h4 class="fw-bold mt-4">Company Dashboard</h4>
            <p class="mt-3">
                See all of your Main and Sub Subjects in one simply dashboard. Open each Subject to access it's Score Page and the numerous features associated with it.
        </div>
    </div>
</div>



<div class="container-fluid cta-red-deep mt-6 container-home">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="fw-bold display-5">Sign Up Now</h4>
                <p>Start choosing the best qualified applicant with Scorng today!</p>
                <a style="color: #FE2301;" class="btn btn-light btn-lg fw-bold mt-4" href="/signup">Sign Up Today</a>
            </div>
        </div>
    </div>
</div>









@include('layouts.footer')

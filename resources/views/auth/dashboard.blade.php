@include('layouts.header', ['title' => $title])

<div class="container mt-4">

    @include('layouts.alert')



    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
            <div class="">

                <div class="row">
                    <div class="col-8">
                        <h2 class="display-4 text-left heading_txt">{{ $user->name }}</h2>
                        @unlessrole('buyer')

                            <span class="fw-bold fs-6">Following: {{ count($agentB) }}</span>
                            &nbsp;

                            <span class="fw-bold fs-6">Followers: {{ count($agentA) }}</span>

                        @endunlessrole
{{--                        <h5 class="fs-6 text-black-50 text-left heading_txt">{{ $user->email }}</h5>--}}
                        {{--            <h5 style="margin-top: -5px;" class="text-dark mt-3 mb-4">See all of your Main and Sub Subjects in one simple dashboard. Open each Subject to access it's Score Page and the numerous features associated with it.--}}
                        {{--            </h5>--}}

                        <div class="mt-4">

                            @unlessrole('buyer')

                            <a class="btn btn-success btn-sm" href="{{ route('create.score.page') }}">Create A Score Page &nbsp;

                                <i class="fas fa-info-circle" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Click here to actually create a new Score Page. A Score Page is the first important step for a buyer’s agent when using Scorng. Create a Score Page and then invite your buyers to add properties that they like, add criteria and score those criteria based on each property.

Each Score Page will be only associated with one buyer or one set of buyers (husband and wife). The best name to give to a Score Page is the buyer’s name.

Both buyer’s and listing agent can also then add properties, message each other and view the criteria and scores that buyers have added.
"></i>


                            </a>
                            @unlessrole('buyer')
                            <a class="btn btn-success btn-sm" href="{{ route('state.dashboard') }}">Location Pages &nbsp;


                            </a>
                            @endunlessrole

                            @endunlessrole


                            <a onclick="selectPhoto()" class="btn btn-dark btn-sm" href="#"> &nbsp;
                                <i class="fas fa-camera-retro"></i>&nbsp; Add Profile Photo

                                <i class="fas fa-info-circle" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Upload your company/your own personal photo. "></i>


                            </a>

                            <form action="{{ route('company.photo') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input style="display: none;" type="file" id="img" name="image" class="form-control" onchange="uploadProfilePhoto();">
                                <button style="display: none;" id="quick_upload" type="submit">save</button>
                            </form>



                        </div>
                    </div>
                    <div class="col-4">
                        @if(\Illuminate\Support\Facades\Auth::user()->photo == null)
                            <p><img src="{{ asset('images/user.svg') }}" class="img-thumbnail mt-3" style="height: 130px; width: 100px; object-fit: cover; float: right; "></p>
                        @else
                            <p><img src="{{ asset('uploads/' . \Illuminate\Support\Facades\Auth::user()->photo) }}" class="img-thumbnail mt-3" style="height: 130px; width: 100px; object-fit: cover; float: right; "></p>
                        @endif
                    </div>
                </div>






            <div class="row mt-4 p-2">
{{--                    <h2 class="fw-bold">Active</h2>--}}
{{--                    <h4 class="display-5 fw-bold @if($i > 1) mt-6 border-top border-2 border-dark @endif p-4" style="color: green; ">{{ $inv->main_subject_name }}</h4>--}}
{{--                    @php--}}
{{--                        $invited = DB::select('select subjects.subject_name, subjects.id, teams.status, teams.user_email from subjects left join teams on (teams.subject_id=subjects.id) where teams.user_email = ? and teams.mainsubject_id = ? and subjects.status = ?', [$user->email, $inv->id, 0]);--}}
{{--                    @endphp--}}
                @if(count($mysubjects) > 0)
                    @unlessrole('buyer')
                    <p class="fw-bold fs-4">My Buyers</p>
                    @endunlessrole
                @endif
                    @foreach ($mysubjects as $in)
                        <div class="col-12 col-xl-4 col-md-4 col-xxl-4 col-sm-12 col-xs-12 mt-3 mb-4">
                            <div class="card text-dark border-success" style="border: 6px solid green !important;">
                                <div class="card-body text-center">

                                  <h4 class="card-title fw-bold mb-2" style="font-size: 22px; color: green;">{{ $in->subject_name }}</h4>

                                @unlessrole('buyer')
                                    @php
                                        $token = Crypt::encrypt($in->user_email . '|' . $in->id);
                                    @endphp

                                    <a href="/score-page/{{$in->id}}" class="btn btn-success btn-sm">Score Page</a>
                                @endunlessrole

                                @role('buyer')
                                <a href="/score-page/{{$in->id}}" class="btn btn-success btn-sm">Score Page</a>
                                @endrole

                                    <br><button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Score Page allows buyers to add scores to each individual criteria for a particular property that they’ve viewed online so that agents can get a sense of what the buyer likes and doesn’t like when it comes to houses. Agents and buyers can then see a comprehensive, detailed and objective overview of the feedback not only on each property but each individual aspect for each property.

">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach







            </div>

                @unlessrole('buyer')

                @include('auth.followdashboard')

                @endunlessrole
{{--                Position Filled--}}

{{--                <div class="row mt-6 border-top border-4 border-dark p-2">--}}
{{--                    @php $i = 1 @endphp--}}
{{--                    @foreach ($mysubjects as $inv)--}}
{{--                        <h2 class="fw-bold">Position Filled</h2>--}}
{{--                        <h4 class="display-5 fw-bold @if($i > 1) mt-6 border-top border-2 border-dark @endif p-4" style="color: green; ">{{ $inv->main_subject_name }}</h4>--}}
{{--                        @php--}}
{{--                            $invited = DB::select('select subjects.subject_name, subjects.id, teams.status, teams.user_email from subjects left join teams on (teams.subject_id=subjects.id) where teams.user_email = ? and teams.mainsubject_id = ? and subjects.status = ?', [$user->email, $inv->id, 1]);--}}
{{--                        @endphp--}}
{{--                        @foreach ($invited as $in)--}}
{{--                            <div class="col-12 col-xl-4 col-md-4 col-xxl-4 col-sm-12 col-xs-12 mt-3 mb-4">--}}
{{--                                <div class="card text-dark border-success" style="border: 6px solid green !important;">--}}
{{--                                    <div class="card-body text-center">--}}
{{--                                        <h4 class="card-title fw-bold mb-2" style="font-size: 22px; color: green;">{{ $in->subject_name }}</h4>--}}
{{--                                        --}}{{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
{{--                                        @php--}}
{{--                                            $token = Crypt::encrypt($in->user_email . '|' . $in->id);--}}
{{--                                        @endphp--}}

{{--                                        @if($in->status == 0)--}}
{{--                                            <a onclick="return confirm('Are you sure?')" class="btn btn-link text-dark text-decoration-underline fw-bold" href="/accept-invitation/{{ $token }}">Accept Invitation</a>--}}
{{--                                        @else--}}
{{--                                            <a href="/score-page/{{$in->id}}" class="btn btn-success btn-sm">Score Page</a>--}}
{{--                                        @endif--}}

{{--                                        <br><button type="button" class="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Subjects are a way to organize where Applicants will be added within your Scorng account. A Subject is broken into two parts, a Main Subject and a Sub Subject. For example, the Main Subject can be something like the store or location where the new Applicant for which you’re hiring, will be working. For example the Sub Subject can be the actual position for which you’re hiring.--}}
{{--">--}}
{{--                                            <i class="fas fa-info-circle"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                        @php $i++ @endphp--}}
{{--                    @endforeach--}}





{{--                </div>--}}


            </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')

<script>
    function selectPhoto() {
        $("#img").trigger('click');
    }

    function uploadProfilePhoto() {
        $('#quick_upload').trigger('click');
    }


</script>

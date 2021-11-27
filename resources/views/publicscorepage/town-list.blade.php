@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8">

            <h2 class="display-4 text-left heading_txt">Town/Neighborhood Dashboard
                <h5>{{ $metro_name->name }} Dashboard</h5>

                {{--                <i--}}
                {{--                    style="text-align: center !important; font-size: 14px;"--}}
                {{--                    data-bs-container="body" data-bs-toggle="popover"--}}
                {{--                    data-bs-placement="top" data-bs-content="" class="fas fa-info-circle"></i>--}}

            </h2>
            <p>Choose the specific town or neighborhood (in the above metro area) where your buyer is looking to buy or where your buyer is selling their house.</p>

            <ul class="list-group mt-4">
                @foreach($towns as $town)
                    <a class="list-group-item list-group-item-action" href="{{ route('follow.scorepage', $town->id) }}"> {{ $town->name }}</a>
                @endforeach
            </ul>

        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')


@include('layouts.header', ['title' => $title])

<div class="container mt-6">
    @if(isset($notFound))
    <div class="row">
        <div class="col-12">
            <div class="">
                <p class="text-center fs-4 fw-bold">{{ $notFound }}</p>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <h1 class="display-4 fw-bold text-center">{{ $faqs[0]->title ?? '' }}</h1>
            <div class="row mt-6 mb-4">

            @foreach($faqs as $faq)

                <h4 class="fw-bold fs-2 mt-4">
                    {{ $faq->questions }}
                </h4>
                <p class="fs-5">
                    {{ $faq->answers }}
                </p>

            @endforeach






            </div>
        </div>
    </div>
</div>






@include('layouts.footer')

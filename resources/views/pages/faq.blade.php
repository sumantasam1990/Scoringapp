@include('layouts.header', ['title' => $title])

<div class="container mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold">Your Questions, Answered.</h1>
            <p>If you don't see your question, feel free to <a class="text-dark fw-bold" href="/contact"> shoot us a message</a>.</p>
            <div class="row mt-6">

                @foreach($faqcategory as $faqcategoryy)

                <div class="col-md-4 mt-4">
                    <div class="box-black-howitworks text-center">
                        <h4 class="fs-3 mt-3 fw-bold">{{ $faqcategoryy->title }}</h4>
                        <p @class('mt-4')><a class="btn btn-dark" href="/faqs/{{ $faqcategoryy->id }}">FAQs</a></p>
                    </div>


                </div>

                @endforeach





            </div>
        </div>
    </div>
</div>






@include('layouts.footer')

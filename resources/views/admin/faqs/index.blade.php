@include('admin.layouts.header', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>FAQs</h1>
            <hr>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <table id="scorng-tbl" class="display table table-bordered table-flush table-striped">
                <thead>
                <tr>
                    <th>Categories</th>
                    <th>Questions</th>
                    <th>Answers</th>

                </tr>
                </thead>
                <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td>{{ $faq->title }}</td>
                        <td>{{ $faq->questions }}</td>
                        <td>{{ $faq->answers }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h4 class="text-center">Add Question & Answer</h4>
            <div class="box">
                <form action="{{ route('admin.faqs.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <select class="form-control @error('cate') is-invalid @enderror" name="cate" required>
                            <option selected value="" required disabled>Select Category</option>
                            @foreach($faqscate as $faqscat)
                                <option {{ (old("cate") == $faqscat->id ? "selected" : "") }} value="{{ $faqscat->id }}">{{ $faqscat->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" required placeholder="Write A Question">
                    </div>
                    <div class="form-group mb-3">
                        <textarea rows="6" class="form-control @error('answers') is-invalid @enderror" name="answers" placeholder="Write Answer"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark">Save</button>
                    </div>
                </form>


            </div>


        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@include('admin.layouts.footer')




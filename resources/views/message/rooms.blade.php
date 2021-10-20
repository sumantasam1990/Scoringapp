@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mb-4">

            <div @class('row')>
                <div class="col-md-6">
                    <h2 class="display-6 text-left heading_txt">Message Room List</h2>
                    <h4 class="fs-4">{{ $mainsubject->main_subject_name }}</h4>
                    <h5 style="margin-top: -5px;" class="display-7 text-left heading_txt">{{ $subject->subject_name }}</h5>



                </div>
                <div class="col-md-6">
                    <a href="/scoring-sheet/{{ $subject->id }}" class="btn btn-success btn-sm">Score Page</a>
                    <a href="#" onclick="openModal()" class="btn btn-success btn-sm">Create New Message Room</a>

                </div>
            </div>

            <hr />

            @foreach($rooms as $room)
            <h4><a style="text-decoration: none; color: #1a1e21;" href="/message-room/{{ $subject->id }}/{{ $room->id }}">{{ $room->room_name }}</a></h4>
            @endforeach




        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2"></div>
    </div>
</div>



@include('layouts.footer')


<div class="modal fade" id="open_room_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="display-6 text-center heading_txt" id="edit_score_heading">Create A New Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('roomname.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="hd_sub_id" value="{{$subject->id}}">
                    <div class="box">
                        <div class="form-group">
                            <input type="text" class="form-control" required name="room_name"
                                   placeholder="Write Your Message Room Name">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<script>
    function openModal() {
        $("#open_room_modal").modal("show");
    }
</script>

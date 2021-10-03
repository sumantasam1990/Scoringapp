    <div class="box mt-3">
        @if ($v == "view")
            <h4>Score: <span>{{ $data[0]->score_number }}</span></h4>
            <p class="fw-bold">Note(s): </p>
            @foreach ($data as $note)
                @if (!empty($note->meta_notes))
                    <div style="border-bottom: 1px solid #eee; padding: 10px;">{{$note->meta_notes}} </div>
                @endif
            @endforeach
            <p class="fw-bold">File(s): </p>
            @foreach ($data as $file)
                @if (!empty($file->meta_file))
                    <p><a style="color: #000;" class="" target="_blank" href="{{ asset('uploads/' . $file->meta_file) }}"> {{ $file->meta_file }}</a> </p>
                @endif
            @endforeach
        @else
            <form action="{{ route('score.edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="hd_id" value="{{$data[0]->score_idd}}">
                <div class="form-group mb-3">
                    <select required class="form-control @error('subject') is-invalid @enderror" name="score_give">
                        <option value="" disabled selected>Choose A Score</option>
                        @foreach ($scores_array as $score)
                            <option value="{{ $score }}" {{ ($data[0]->score_number == $score ? "selected" : "") }}>{{ $score }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <p class="fw-bold">Note(s): </p>
                    @foreach ($data as $note)
                        @if (!empty($note->meta_notes))
                            <div style="border-bottom: 1px solid #eee; padding: 10px;">{{$note->meta_notes}}  (<a href="/remove/note/{{$note->metas_id}}" style="color: #000; font-weight: bold;" onclick="return confirm('Are you sure you want to delete this score?')">Remove Note</a>)</div>
                        @endif
                    @endforeach
                    {{-- <textarea name="note" class="form-control @error('note') is-invalid @enderror" placeholder="Write your notes... (Optional)"></textarea> --}}
                </div>

                <div id="extra"></div>
                <p class="fw-bold">File(s): </p>
                @foreach ($data as $file)
                    @if (!empty($file->meta_file))
                        <p><a style="color: #000;" class="" target="_blank" href="{{ asset('uploads/' . $file->meta_file) }}"> {{ $file->meta_file }}</a> (<a style="color: #000; font-weight: bold;" href="/remove/file/{{$file->metas_id}}" onclick="return confirm('Are you sure you want to delete this score?')">Remove File</a>) </p>
                    @endif
                @endforeach




                <input type="hidden" id="appl" name="appl" value="{{$data[0]->applicant_id}}">
                <input type="hidden" id="sub" name="sub" value="{{$data[0]->subject_id}}">
                <input type="hidden" id="crit_id" name="crit_id" value="{{$data[0]->criteria_id}}">

                <input style="display: none;" type="file" id="img-edit" name="image" class="form-control">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="/delete/score/{{$data[0]->score_idd}}" class="btn btn-danger btn-md" onclick="return confirm('Are you sure you want to delete this score?')">Delete</a>
                    <button type="button" class="btn btn-dark btn-md" onclick="note_extra()">Add Note</button>
                    <button type="button" class="btn btn-dark btn-md" onclick="selectPhotoEdit()">Add File</button>
                    <button type="submit" class="btn btn-dark btn-md">Update</button>
                </div>
            </form>
        @endif

        </div>

        <script>
        function selectPhotoEdit() {
            $("#img-edit").trigger('click');
        }

        var total = 0;
        function note_extra() {
           if(total < 1) {
                $("#extra").append(`<div class="form-group mb-3">
                        <textarea name="note" class="form-control @error('note') is-invalid @enderror" placeholder="Write your notes... (Optional)"></textarea>
                    </div>`);
           }
           total++;
        }


        </script>

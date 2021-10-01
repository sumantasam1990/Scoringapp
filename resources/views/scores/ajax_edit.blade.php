    <div class="box mt-3">
            <form action="{{ route('score.edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="hd_id" value="{{$data['id']}}">
                <div class="form-group mb-3">
                    <select required class="form-control @error('subject') is-invalid @enderror" name="score_give">
                        <option value="" disabled selected>Choose A Score</option>
                        @foreach ($scores_array as $score)
                            <option value="{{ $score }}" {{ ($data['score_number'] == $score ? "selected" : "") }}>{{ $score }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <textarea name="note" class="form-control @error('note') is-invalid @enderror" placeholder="Write your notes... (Optional)">{{$data['notes']}}</textarea>
                </div>

                @if (!empty($data['score_files']))
                    <a style="color: #000;" class="btn btn-link" target="_blank" href="{{ asset('uploads/' . $data['score_files']) }}"> {{ $data['score_files'] }}</a>
                @endif


                <input type="hidden" id="appl" name="appl" value="{{$data['applicant_id']}}">
                <input type="hidden" id="sub" name="sub" value="{{$data['subject_id']}}">
                <input type="hidden" id="crit_id" name="crit_id" value="{{$data['criteria_id']}}">

                <input style="display: none;" type="file" id="img-edit" name="image" class="form-control">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="/delete/score/{{$data['id']}}" class="btn btn-danger btn-md" onclick="return confirm('Are you sure you want to delete this score?')">Delete</a>
                    <button type="button" class="btn btn-dark btn-md" onclick="selectPhotoEdit()">Add File</button>
                    <button type="submit" class="btn btn-dark btn-md">Update</button>
                </div>
            </form>
        </div>

        <script>
        function selectPhotoEdit() {
            $("#img-edit").trigger('click');
        }
        </script>

<div>
{{--    <div wire:ignore="applicantsArray" class="form-group mb-4">--}}
{{--    <select wire:model="applicant_id" wire:change="changeData()" name="" class="form-control">--}}
{{--        <option disabled selected value="">Select an existing Property</option>--}}
{{--        @foreach($applicantsArray as $arr)--}}
{{--            <option value="{{ $arr['id'] }}">{{ $arr['name'] }}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    </div>--}}

{{--    <div style="margin-bottom: 15px; text-align: center; font-size: 22px; font-weight: bold;">Or</div>--}}
    {{-- <div class="form-group mb-4">
        <input required type="text" name="name"
               class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $applicantName }}"
               placeholder="Which Buyer(s) are you adding this Property to?" autocomplete="off">
    </div> --}}

{{--    @unlessrole('buyer')--}}
{{--    @if(count($agentB) == 0)--}}
    <div class="form-group mb-4">
        <input required type="text" name="email"
               class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ? old('email') : $applicantEmail }}"
               placeholder="Property Address" autocomplete="offf">
    </div>
{{--    @endif--}}
{{--    @endunlessrole--}}

    <div class="form-group mb-4">
        <input required type="text" name="phone"
               class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ? old('phone') : $applicantPh }}"
               placeholder="Listing Link" autocomplete="offff">
    </div>

    <div class="form-group mb-4">
        <textarea required name="important_note"
               class="form-control @error('important_note') is-invalid @enderror" value="{{ old('important_note') ? old('important_note') : '' }}"
               placeholder="Important Note...(Optional)" rows="4"></textarea>
    </div>


</div>

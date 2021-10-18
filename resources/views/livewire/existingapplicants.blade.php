<div>
    <div wire:ignore="applicantsArray" class="form-group mb-4">
    <select wire:model="applicant_id" wire:change="changeData()" name="" class="form-control">
        <option disabled selected value="">Select an existing applicant</option>
        @foreach($applicantsArray as $arr)
            <option value="{{ $arr['id'] }}">{{ $arr['name'] }}</option>
        @endforeach
    </select>
    </div>

    <div style="margin-bottom: 15px; text-align: center; font-size: 22px; font-weight: bold;">Or,</div>
    <div class="form-group mb-4">
        <input required type="text" name="name"
               class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $applicantName }}"
               placeholder="New Applicant's Name" autocomplete="off">
    </div>
    <div class="form-group mb-4">
        <input required type="email" name="email"
               class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ? old('email') : $applicantEmail }}"
               placeholder="New Applicant's Email" autocomplete="offf">
    </div>
    <div class="form-group mb-4">
        <input required type="text" name="phone"
               class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ? old('phone') : $applicantPh }}"
               placeholder="New Applicant's Phone Number" autocomplete="offff">
    </div>


</div>

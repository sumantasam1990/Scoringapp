<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <select wire:model="state" wire:change="changeState" class="form-control @error('state') is-invalid @enderror" name="state">
                <option value="" selected>Choose State</option>
                @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <select onchange="openMetroModal(this.value)" wire:model="metro" wire:change="changeMetro" class="form-control @error('metro') is-invalid @enderror" name="metro">
                <option value="" selected>Choose Metro</option>
                <optgroup>
                    <option style="background-color: green; color: #fff;" value="add_new_metro">Add New Metro Area</option>
                </optgroup>
                @foreach($metroData as $metro)
                    <option value="{{ $metro->id }}">{{ $metro->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <select onchange="openTownModal(this.value)" wire:model="town" class="form-control @error('town') is-invalid @enderror" name="town">
                <option value="" selected>Choose Town</option>
                <optgroup>
                    <option style="background-color: green; color: #fff;" value="add_new_town">Add New Town/Neighborhood</option>
                </optgroup>
                @foreach($townData as $town)
                    <option value="{{ $town->id }}">{{ $town->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<input type="text" id="state_id" value="{{ $state }}">

<div>

    <p>{{ $criteria_name }} <i wire:click="startEdit" style="font-size: 16px; cursor: pointer;" class="bi bi-pencil"></i></p>

    @if($edit)
        <form style="display: flex !important;
    flex-wrap: nowrap;
    flex-direction: row;
    align-content: center;
    justify-content: center;
    align-items: stretch;" wire:submit.prevent="save">
            @csrf
            <input wire:model="main_criteria_id" type="hidden" value="{{ $main_criteria_id }}">
            <input wire:model="criteria_name" style="width: 250px;" type="text" name="title" class="border-1" value="{{ $criteria_name }}">
            <button class="btn btn-dark" type="submit">Save</button>
        </form>
    @endif

</div>

<div>
    <p>{{ $title }} <i wire:click="startEdit" style="font-size: 16px; cursor: pointer;" class="bi bi-pencil"></i></p>

    @if($edit)
        <form class="d-flex" wire:submit.prevent="save">
            @csrf
            <input wire:model="criteria_id" type="hidden" value="{{ $criteria_id }}">
            <input wire:model="title" style="width: 250px;" type="text" name="title" class="border-1" value="{{ $title }}">
            <button class="btn btn-dark" type="submit">Save</button>
        </form>
    @endif

</div>

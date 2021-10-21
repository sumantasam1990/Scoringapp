<div>


    <h2 class="display-5 text-left heading_txt"> {{ $main_subject_name }} <i wire:click="startEditMainSubject" style="font-size: 18px; cursor: pointer;" class="bi bi-pencil"></i></h2>

    @if($edit_main_subject)
        <form class="d-flex" wire:submit.prevent="savemainsubject">

            <input wire:model="main_subject_id" type="hidden" value="{{ $main_subject_id }}">
            <input wire:model="main_subject_name" style="width: 250px;" type="text" name="subject_name" class="border-1" value="{{ $main_subject_name }}">
            <button class="btn btn-dark" type="submit">Save</button>
        </form>
    @endif


    <p class="fs-3 mt-3">{{ $subject_name }} <i wire:click="startEdit" style="font-size: 18px; cursor: pointer;" class="bi bi-pencil"></i></p>

    @if($edit)
        <form class="d-flex" wire:submit.prevent="save">

            <input wire:model="subject_id" type="hidden" value="{{ $subject_id }}">
            <input wire:model="subject_name" style="width: 250px;" type="text" name="subject_name" class="border-1" value="{{ $subject_name }}">
            <button class="btn btn-dark" type="submit">Save</button>
        </form>
    @endif


</div>

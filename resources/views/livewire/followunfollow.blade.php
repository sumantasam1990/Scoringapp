<div>
    @if($follow)
    <a class="ml-5 btn btn-dark btn-sm" wire:click="follow_now" wire:model="agentID">Follow</a>
    @else
    <a class="ml-5 btn btn-outline-dark btn-sm" wire:click="unfollow_now" wire:model="agentID">Unfollow</a>
    @endif
</div>

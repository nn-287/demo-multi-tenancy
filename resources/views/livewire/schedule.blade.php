<div>
    <x-layouts.app>
        <div>
            @if(Auth::user())
                <div class="schedule-content">
                    <h2>Schedule</h2>
                    <button class="btn btn-primary" wire:click="index">Choose Me!</button> 
                    <livewire:Calendar />
                </div>
            @else
                <p>Please login to view your schedule.</p>
            @endif
        </div>
    </x-layouts.app>
</div>
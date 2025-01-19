<div class="w-full">
    @if(Auth::user())
        <div class="schedule-content w-full">
            <div class="bg-white rounded-lg shadow-md p-4">
                <livewire:Calendar />
            </div>
        </div>
    @else
        <p>Please login to view your schedule.</p>
    @endif
</div>
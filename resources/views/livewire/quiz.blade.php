<div>
    <x-layouts.app>
        <div>
            @if(Auth::user())
                {{-- <h1>Your Quiz</h1>
                <h2>Welcome! from quizzes</h2>
                <button class="btn btn-primary" wire:click="index">Click Me!</button> --}}

                <div class="quiz-content">
                    <livewire:Quiz />
                </div>
            @else
                <p>Please login to view your schedule.</p>
            @endif
        </div>
    </x-layouts.app>
</div>
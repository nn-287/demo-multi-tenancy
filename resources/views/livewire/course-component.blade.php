<div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
    @if($toggle)
        <livewire:course-detail :courseId="$selectedCourseId" :key="$selectedCourseId" /> 
    @else
        @foreach ($courses as $course)
            <div class="border border-gray-300 rounded-lg p-4 bg-white shadow-sm">
                <button class="btn btn-primary" wire:click="toggleName({{$course->id }})">{{$course->name}}</button>
                <p class="text-gray-600"><strong>Description:</strong> {{ $course->description }}</p>
                <p class="text-gray-600"><strong>Status:</strong> {{ $course->status }}</p>
                <p class="text-gray-600"><strong>credit:</strong> {{ $course->credit }}</p>
            </div>
        @endforeach
    @endif
</div>
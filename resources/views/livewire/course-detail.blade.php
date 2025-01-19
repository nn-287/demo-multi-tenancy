<div>
    <x-layouts.app>
        @if($course)
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">{{ $course->name }}</h2>

                <!--  Display Video -->
                @if($videoUrl)
                    <div class="mt-4">
                        <video controls class="w-full rounded-md shadow-md">
                            <source src="{{ $videoUrl }}" type="video/mp4">
                        </video>
                    </div>
                        @else
                        <!-- Initial Modal -->
                        <dialog id="initial_modal" class="modal modal-bottom sm:modal-middle" {{ $showInitialModal ? 'open' : '' }}>
                            <div class="modal-box">
                                <h3 class="text-lg font-bold">No Video Available</h3>
                                <p class="py-4">No video available for this course. Would you like to upload one?</p>
                                <div class="modal-action">
                                    <button class="btn btn-primary" wire:click="openUploadModal">Add Video</button>
                                    <form method="dialog">
                                        <button class="btn" wire:click="$set('showInitialModal', false)">Close</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                    
                        <!-- Upload Modal -->
                        @if($showUploadModal)
                            <div class="modal modal-open">
                                <div class="modal-box">
                                    <h3 class="text-lg font-bold">Upload Course Video</h3>
                                    <div class="mt-4">
                                        <input type="file" 
                                            wire:model="video" 
                                            accept="video/*" 
                                            class="file-input file-input-bordered w-full max-w-xs"
                                        />
                                        @if($video)
                                            <video controls class="mt-4 w-full rounded-md shadow-md">
                                                <source src="{{ $video->temporaryUrl() }}" type="video/mp4">
                                            </video>
                                        @endif
                                        @error('video') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="modal-action">
                                        <button class="btn btn-primary" wire:click="saveAndCloseModal">Save</button>
                                        <button class="btn" wire:click="$set('showUploadModal', false)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                <div class="space-y-4">
                    <div>
                        <h3 class="font-semibold">Description:</h3>
                        <p>{{ $course->description }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold">Status:</h3>
                        <p>{{ $course->status }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold">Credit:</h3>
                        <p>{{ $course->credit }}</p>
                    </div>
                </div>
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" wire:click="BackToCourse">
                    Back to Course List
                </button>
            </div>
            {{-- //TODO - FAQ - --}}
        @else
            <p>Course not found.</p>
        @endif
    </x-layouts.app>
</div>

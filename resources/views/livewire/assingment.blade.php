<div>
    <x-layouts.app>
        {{-- <button class="btn btn-primary" wire:click="test">Run test</button> --}}
        <div class="container mx-auto p-4">
            <!-- Meeting Controls -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-bold mb-4">Virtual Classroom</h2>
                
                <!-- Create Meeting Section -->
                <div class="mb-6">
                    <form wire:submit.prevent="createMeeting">
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Meeting Name</label>
                            <input type="text" wire:model="meetingName" 
                                class="w-full p-2 border rounded">
                        </div>
                        <button type="submit" 
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Create Mock Meeting
                        </button>
                    </form>
                </div>
        
                <!-- Join Meeting Section -->
                <div class="mb-6">
                    <h3 class="text-xl mb-4">Join Meeting</h3>
                    @if($meetingActive)
                        <button wire:click="joinMeeting" 
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Join Virtual Classroom
                        </button>
                    @else
                        <p class="text-gray-600">No active meeting available</p>
                    @endif
                </div>
        
                <!-- Meeting Status -->
                <div class="bg-gray-100 p-4 rounded">
                    <p>Status: <span class="font-bold">{{ $meetingStatus ?? 'No Meeting' }}</span></p>
                    <p>Participants: <span class="font-bold">{{ $participantCount ?? 0 }}</span></p>
                </div>
            </div>
        
            <!-- Meeting iframe (when active) -->
            @if($showMeeting)
                <div class="w-full h-screen">
                    <iframe src="{{ $meetingUrl }}"
                            class="w-full h-full border-0"
                            allow="camera; microphone; fullscreen; speaker; display-capture">
                    </iframe>
                </div>
            @endif
        </div>
    </x-layouts.app>
</div>

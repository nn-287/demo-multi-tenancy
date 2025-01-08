<div>
    <x-layouts.app>
        <div>
            <div class="drawer">
                <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                  <!-- Page content here -->
                  
                    @if ($toggle)
                        <div class="p-4">
                            {{-- @livewire('list-request', ['toggle' => $toggle]) --}}
                        </div>
                    @else
                        <x-user-hero />
                    @endif
                  <label for="my-drawer" class="btn btn-primary drawer-button ">
                    <i class="fas fa-bars"></i>
                  </label>                
                </div>
                <div class="drawer-side">
                    <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                        <!-- Sidebar content here -->
                        <li class="menu-title">
                            <span>Home</span>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="/user-dashboard">Home</a>
                        </li>

                        <li class="menu-title">
                            <span>Enrolled Courses</span>
                        </li>
                        <li>
                            <button class="btn btn-primary" wire:click="">Courses</button>
                        </li>

                        <li class="menu-title">
                            <span>Classes</span>
                        </li>
                        <li>
                            <button class="btn btn-primary" wire:click="">Classes</button>
                        </li>

                        <li class="menu-title">
                            <span>Chores</span>
                        </li>
                        <li>
                            <button class="btn btn-primary" wire:click="">Quizzes</button>
                        </li>
                        <br>
                        <li>
                            <button class="btn btn-primary" wire:click="">Assignments</button>
                        </li>

                        
                        <br>
                        <li class="menu-title">
                            <span>Others</span>
                        </li>
                        <li>
                            <button class="btn btn-primary" wire:click="">Forums</button>
                        </li>
                    </ul>
                </div>
              </div>
        </div>        
    </x-layouts.app>
    <x-footer />
</div>

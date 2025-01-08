<div>
    <x-layouts.app>
        <div>
            <div class="drawer">
                <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                  <!-- Page content here -->
                  
                    @if ($toggle)
                        <div class="p-4">
                            @livewire('list-request', ['toggle' => $toggle])
                        </div>
                    @else
                        <x-hero />
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
                            <span>Tenancy Requests</span>
                        </li>
                        <li>
                            <button class="btn btn-primary" wire:click="toggleRequests">Requests</button>
                        </li>
                        <br>
                        <li class="menu-title">
                            <span>Settings</span>
                        </li>
                        <li>
                            <button class="btn btn-primary" wire:click="toggleRequests">Settings</button>
                        </li>
                    </ul>
                </div>
              </div>
        </div>        
    </x-layouts.app>
</div>

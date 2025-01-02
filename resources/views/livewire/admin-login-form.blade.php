<div>
    <x-layouts.app>
        <div>
            <form wire:submit.prevent="login">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                    <div>
                        <label for="hs-email-contacts-1" class="block mb-2 text-sm text-gray-700 font-medium">Email</label>
                        <input type="email" wire:model="email" name="hs-email-contacts-1" id="hs-email-contacts-1" autocomplete="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm text-black focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        <div>@error('email') <em class="text-red-500">{{$message}}</em> @enderror</div>
                    </div>
                <div class="form-group">
                    <label for="hs-email-contacts-1" class="block mb-2 text-sm text-gray-700 font-medium">Password</label>
                    <input type="password" wire:model="password" name="hs-email-contacts-1" id="hs-email-contacts-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm text-black focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <div>@error('password') <em class="text-red-500">{{$message}}</em> @enderror</div>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </x-layouts.app>
</div>
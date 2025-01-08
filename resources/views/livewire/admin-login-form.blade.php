<div>
    <x-layouts.app>
         <!--Form-->
         <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="max-w-xl mx-auto">
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-white-800 sm:text-4xl">
                        Login
                    </h1>
                </div>

            </div>
        
            <div class="mt-12 max-w-lg mx-auto">
            <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-neutral-700">

                <form wire:submit.prevent="login">
                    <div class="grid gap-4 lg:gap-6">
                        <div>
                            <label for="hs-email-contacts-1" class="block mb-2 text-sm text-gray-700 font-medium">Email</label>
                            <input type="text" wire:model="email" name="hs-email-contacts-1" id="hs-email-contacts-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm text-black focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                            <div>@error('email') <em class="text-red-500">{{$message}}</em> @enderror</div>
                        </div>
                
                        <div>
                            <label for="hs-password-contacts-1" class="block mb-2 text-sm text-gray-700 font-medium">Password</label>
                            <input type="password" wire:model="password" name="hs-password-contacts-1" id="hs-password-contacts-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm text-black focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                            <div>@error('password') <em class="text-red-500">{{$message}}</em> @enderror</div>
                        </div>
                
                        <div class="mt-6">
                            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">login</button>
                        </div>
                    </div>
                </form>

            </div>
            </div>
        </div>
    <!--End Form-->
    </x-layouts.app>
</div>
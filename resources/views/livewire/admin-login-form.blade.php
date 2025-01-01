<div>
    <form wire:submit.prevent="login">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" wire:model="email">
            <div>@error('name') <em class="text-red-500">{{$message}}</em> @enderror</div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" wire:model="password">
            <div>@error('name') <em class="text-red-500">{{$message}}</em> @enderror</div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<div>
    <form wire:submit="createNewUser" action="">
        <input wire:model="name" type="text" placeholder="Name" class="@error('title') is-invalid @enderror">
        <div>
        @error('name') <span class="error">{{ $message }}</span> @enderror 
    </div>
        <input wire:model="email" type="email" placeholder="Email">
        <div>@error('email') {{ $message }} @enderror</div>
        <input wire:model="password" type="password" placeholder="password">
        <div>@error('password') {{ $message }} @enderror</div>
        <button type="submit"  class="primary-btn">Create</button>
    </form>
</div>

<div>
    <form wire:submit="createPost">
        <input wire:model="form.name" type="text" placeholder="Name" class="@error('title') is-invalid @enderror">
        <div>
        @error('form.name') <span class="error">{{ $message }}</span> @enderror 
    </div>
        <input wire:model="form.email" type="email" placeholder="Email">
        <div>@error('form.email') {{ $message }} @enderror</div>
        <input wire:model="form.password" type="password" placeholder="password">
        <div>@error('form.password') {{ $message }} @enderror</div>
        <button type="submit"  class="primary-btn">Create Post</button>
    </form>
</div>

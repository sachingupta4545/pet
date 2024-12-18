<div>
    <form wire:submit="createNewUser" action="">
        <input wire:model="name" type="text" placeholder="Name">
        <input wire:model="email" type="email" placeholder="Email">
        <input wire:model="password" type="password" placeholder="password">
        <button  class="primary-btn">Create</button>
    </form>
</div>

<div>

    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                
                <h2 class="text-lg font-bold">Todo List</h2>
            
                <!-- Input Field -->
                <input type="text" wire:model="todo" class="border p-2 rounded" placeholder="Enter a task">
                
                <!-- Buttons -->
                <button wire:click="addTodo" class="bg-blue-500 text-white px-4 py-2 rounded">Add Todo</button>
                <button wire:click="clearTodos" class="bg-red-500 text-white px-4 py-2 rounded">Clear All</button>
            
                <!-- Todo List -->
                <ul class="mt-4">
                    @foreach ($todos as $index => $task)
                        <li class="p-2 border-b">{{ $task }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    
</div>
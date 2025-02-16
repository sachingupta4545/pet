<?php

namespace App\Livewire;

use Livewire\Component;

class TestingToDo extends Component
{
    public $todos = [];
    public $todo = '';

    public function addTodo()
    {
        $this->todos[] = $this->pull('todo'); // Retrieve and reset in one step
    }

    public function clearTodos()
    {
        $this->reset('todos'); // Reset the entire todos array
    }

    public function render()
    {
        return view('livewire.testing-to-do');
    }
}

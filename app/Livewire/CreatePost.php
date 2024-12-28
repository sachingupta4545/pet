<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\PostForm;

class CreatePost extends Component
{

    public PostForm $form;

    public function createPost()
    {
        $this->validate();
        dd($this);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class ClickButton extends Component
{
    public $name;
    public $email;
    public $password;

    public function createNewUser()
    {
        dump("jsjdasf");
    }
    public function render()
    {


        return view('livewire.click-button');
    }
}

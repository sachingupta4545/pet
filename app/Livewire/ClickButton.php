<?php

namespace App\Livewire;

use Livewire\Component;

class ClickButton extends Component
{
    public function handle()
    {
        dump("jsjdasf");
    }
    public function render()
    {


        return view('livewire.click-button');
    }
}

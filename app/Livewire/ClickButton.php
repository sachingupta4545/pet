<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class ClickButton extends Component
{
    #[Validate('required|min:3|regex:/^[a-zA-Z0-9_]+$/')]
    public $name;
    
    #[Validate('required|min:3')]
    public $email;
    public $password;

    public function createNewUser(Request $request)
    {
        $validated = $this->validate([ 
            'name' => 'required|min:3|regex:/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=]).*$
/',
            'email' => 'required|min:3',
        ]);

        dd("jsjdasf",gettype($this),$validated);
    }
    public function render()
    {
        return view('livewire.click-button');
    }
}

<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    #[Validate('required|min:5')]
    public $name = '';
 
    #[Validate('required|min:5')]
    public $email = '';
    
    #[Validate('required|min:5')]
    public $password = '';
}

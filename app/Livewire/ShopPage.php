<?php

namespace App\Livewire;

use App\Http\Controllers\admin\CategoryController;
use App\Models\Category;
use Livewire\Component;

class ShopPage extends Component
{
    public $categories=[];

    
    public function render()
    {
        $categoryControllerInstance=new CategoryController();
       $this->categories= $categoryControllerInstance->getCategories();
        return view('livewire.shop-page');
    }
}

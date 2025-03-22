<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class ShopPage extends Component
{
    use WithPagination;

    public $categories;
    public $selectedCategory = null;
    public $sorting = 'on_sale'; // Default sorting value

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage(); // Reset pagination when category changes
    }


    public function updateSorting($sortingparam)
    {
        Log::info('Sorting Updated:', ['sorting' => $this->sorting]); // Debugging Log
        $this->sorting=$sortingparam;
        $this->resetPage(); // Reset pagination when sorting changes
    }

    public function render()
    {
        Log::info('render:', ['sorting' => $this->sorting]); // Debugging Log
        $products = Product::when($this->selectedCategory, function ($query) {
            return $query->where('category_id', $this->selectedCategory);
        })
            ->when($this->sorting, function ($query) {
                if ($this->sorting === 'asc') {
                    return $query->orderBy('price', 'asc');
                } elseif ($this->sorting === 'desc') {
                    return $query->orderBy('price', 'desc');
                } elseif ($this->sorting === 'on_sale') {
                    return $query->orderByDesc('on_sale')->orderBy('price', 'asc'); // Prioritize on_sale, then sort by price
                }
            })
            ->paginate(5);
            dd($products);
        return view('livewire.shop-page', compact('products'));
    }
}

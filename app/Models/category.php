<?php

namespace App\Models;

use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use WithPagination;
    protected $fillable=[
        'name','slug','image','is_active'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }


}

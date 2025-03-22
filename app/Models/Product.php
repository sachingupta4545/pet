<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable=[
            'category_id',
            'categories',
            'brand_id',
            'name',
            'slug',
            'images',
            'description',
            'price',
            'is_active',
            'is_featured',
            'is_stock',
            'on_sale',
    ];


    protected $casts=[
        'images'=>'array',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getProductImageAttribute() {
        $images = $this->images ?? [];

        // Check if images exist, otherwise return default placeholder
        if (!empty($images) && isset($images[0])) {

            $decodeImages=json_decode($images);
            return Storage::Url($decodeImages[0]); // Adjust path if needed
        }

        return asset('theme/img/best-product-5.jpg'); // Default image if no product image is available
    }
}

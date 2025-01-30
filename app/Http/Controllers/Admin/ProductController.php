<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Brand, Category, User,Product};

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }
      // Show the form for creating a new resource (GET /product/create)
      public function create()
      {
        $categories=Category::all(['id','name']);
        $brands=Brand::all(['id','name']);
          return view('admin.product.add_edit',compact('categories','brands')); // Return a view for creating a product
      }
  
      // Store a newly created resource in storage (POST /product)
      public function store(Request $request)
      {
        try {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'unique:products,slug'],
                'description' => ['nullable', 'string'],
                'isFeatured' => ['required', 'boolean'],
                'category_id' => ['required', 'integer', 'exists:categories,id'],
                'brand_id' => ['required', 'integer', 'exists:brands,id'],
                'on_sale' => ['required', 'boolean'],
                'price' => ['required', 'integer'],
                'in_stock' => ['required', 'boolean'],
            ]);
        
            Product::create($validatedData); // Save the new product
            return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
            
        } catch (\Exception $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
      }
  
      // Display the specified resource (GET /product/{product})
      public function show(Product $product)
      {
          return view('products.show', compact('product')); // Pass the product to the view
      }
  
      // Show the form for editing the specified resource (GET /product/{product}/edit)
      public function edit(Product $product)
      {
          return view('products.edit', compact('product')); // Pass the product to the view for editing
      }
  
      // Update the specified resource in storage (PUT/PATCH /product/{product})
      public function update(Request $request, Product $product)
      {
          $validated = $request->validate([
              'name' => 'required|string|max:255',
              'price' => 'required|numeric',
          ]);
  
          $product->update($validated); // Update the product
          return redirect()->route('product.index')->with('success', 'Product updated successfully.');
      }
  
      // Remove the specified resource from storage (DELETE /product/{product})
      public function destroy(Product $product)
      {
          $product->delete(); // Delete the product
          return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
      }
}



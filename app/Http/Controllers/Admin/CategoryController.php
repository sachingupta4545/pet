<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class CategoryController extends Controller
{
    public function index()
    {
        $categories= $this->getCategories();
        return view('admin.category.index',compact('categories'));
    }
    public function add(Request $request)
    {
        try 
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:Categories,slug',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

                // Check if the image file is uploaded
                if ($request->hasFile('image')) {
                    $this->storingImage($request->file('image'), 'categories');
                } else {
                    return redirect()->back()->with('error', 'No image file was uploaded.');
                }
           
            $data=[
                'name'=>$request->name ?? '',
                'slug'=>$request->slug ?? '',
                'image'=>$imagePath ?? '',
                'is_active'=>($request->is_active === 'on' ? true: false),
            ];
            Category::create($data);
            return redirect()->route('admin.category.index')->with('success',"successfully");
        } catch (\Exception $e) {
           return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function storingImage($data, string $pathofImage)
    {
        try {
            // Ensure $data is not null and is a valid uploaded file
            if (empty($data) || !$data->isValid()) {
                return null;
            }
    
            // Ensure $path is valid
            if (empty($pathofImage)) {
                throw new \Exception("Storage path cannot be empty.");
            }
    
            // Get file information
            $file = $data->getClientOriginalName();
            $size = $data->getSize();

            // Store the file in the specified path
            // $filePath = Storage::disk('public')->put($pathofImage,$data);

            // $filePath =Storage::put($pathofImage, $data, 'public');
            $filePath = $data->store($pathofImage, 'public'); // 'public disk
           
            return [
                'name' => $file,
                'url' => $filePath,
                'size' => round($size / 1024, 2), // Size in KB with 2 decimal places
            ];
        } catch (\Throwable $th) {
            // Handle exceptions and provide meaningful messages
            throw new \Exception("Error while uploading image: " . $th->getMessage());
        }
        
    }

    public function getCategories()
    {
        return Category::with('products')->get();
    }
}
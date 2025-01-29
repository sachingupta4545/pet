<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Brand};

class BrandController extends Controller
{
    public function index()
    {
      $brands=Brand::all();
      return view('admin.brand.index',compact('brands'));
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
                   $imagePath= $this->storingImage($request->file('image'), 'brands');
                } else {
                    return redirect()->back()->with('error', 'No image file was uploaded.');
                }
           
            $data=[
                'name'=>$request->name ?? '',
                'slug'=>$request->slug ?? '',
                'image'=>$imagePath['url'] ?? '',
                'is_active'=>($request->is_active === 'on' ? true: false),
            ];
            Brand::create($data);
            return redirect()->route('admin.brand.index')->with('success',"successfully done");
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
            $filePath = $data->store($pathofImage, 'public'); 
           
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
}

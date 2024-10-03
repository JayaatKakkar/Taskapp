<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\View\View;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('imageUpload');
    }

    public function store(Request $request)
    {
        error_log("Here");
        // Validate incoming request data
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        // Initialize an array to store image information
        $images = [];
  
        // Process each uploaded image
        foreach($request->file('images') as $image) {
            // Generate a unique name for the image
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
              
            // Move the image to the desired location
            $image->move(public_path('images'), $imageName);
  
            // Add image information to the array
            $images[] = ['name' => $imageName];
        }
  
        // Store images in the database using create method
        foreach ($images as $imageData) {
            Image::create($imageData);
        }
          
        return back()->with('success', 'Images uploaded successfully!')
                     ->with('images', $images); 
    }
     
}

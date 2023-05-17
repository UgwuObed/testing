<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function store(Request $request)
    {
        // validate form input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // upload image
        $imageName = time().'.'.$validatedData['image']->extension();  
        $validatedData['image']->move(public_path('images'), $imageName);

        // create new clothes product
        $clothes = new Clothes;
        $clothes->name = $validatedData['name'];
        $clothes->type = $validatedData['type'];
        $clothes->color = $validatedData['color'];
        $clothes->size = $validatedData['size'];
        $clothes->brand = $validatedData['brand'];
        $clothes->price = $validatedData['price'];
        $clothes->description = $validatedData['description'];
        $clothes->category = $validatedData['category'];
        $clothes->image_url = $imageName;
        $clothes->save();

        // redirect back to form with success message
        return redirect()->back()->with('success', 'Clothes product created successfully!');
    }

    public function uploadImage()
    {
        return view('clothes.upload');
    }

    public function saveImage(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        return response()->json(['success'=>'Image uploaded successfully.']);
    }
}

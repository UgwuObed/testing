<?php

namespace App\Http\Controllers;

use App\Models\Shoes;
use Illuminate\Http\Request;

class ShoesController extends Controller
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
        $shoes = new Shoes;
        $shoes->name = $validatedData['name'];
        $shoes->type = $validatedData['type'];
        $shoes->color = $validatedData['color'];
        $shoes->size = $validatedData['size'];
        $shoes->brand = $validatedData['brand'];
        $shoes->price = $validatedData['price'];
        $shoes->description = $validatedData['description'];
        $shoes->category = $validatedData['category'];
        $shoes->image_url = $imageName;
        $shoes->save();

        // redirect back to form with success message
        return redirect()->back()->with('success', 'Product created successfully!');
    }

    public function uploadImage()
    {
        return view('shoes.upload');
    }

    public function saveImage(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        return response()->json(['success'=>'Image uploaded successfully.']);
    }
    
    public function index()
{
    $shoes = Shoes::all(); // Retrieve all foods from the database

    return view('shoes.index', compact('shoes'));
}
}

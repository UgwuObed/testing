<?php

namespace App\Http\Controllers;
use App\Models\Foods;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        
        $imageName = time().'.'.$validatedData['image']->extension();  
        $validatedData['image']->move(public_path('images'), $imageName);

       
        $foods = new Foods;
        $foods->name = $validatedData['name'];
        $foods->type = $validatedData['type'];
        $foods->quantity = $validatedData['quantity'];
        $foods->price = $validatedData['price'];
        $foods->description = $validatedData['description'];
        $foods->category = $validatedData['category'];
        $foods->image_url = $imageName;
        $foods->save();

        // redirect back to form with success message
        return redirect()->back()->with('success', 'Foods product created successfully!');
    }

    public function uploadImage()
    {
        return view('foods.upload');
    }

    public function saveImage(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        return response()->json(['success'=>'Image uploaded successfully.']);
    }

    public function index()
{
    $foods = Foods::all(); // Retrieve all foods from the database

    return view('foods.index', compact('foods'));
}

}

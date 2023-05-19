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
        return redirect()->back()->with('success', 'Food product created successfully!');
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

    public function edit(Foods $food)
    {
        // Retrieve the food item from the database
        // and pass it to the view for editing
        return view('foods.edit', compact('food'));
    }

    public function update(Request $request, Foods $food)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // If a new image is uploaded, update the image URL
            $imageName = time().'.'.$validatedData['image']->extension();  
            $validatedData['image']->move(public_path('images'), $imageName);
            $foods->image_url = $imageName;
        }

        $foods->name = $validatedData['name'];
        $foods->type = $validatedData['type'];
        $foods->quantity = $validatedData['quantity'];
        $foods->price = $validatedData['price'];
        $foods->description = $validatedData['description'];
        $foods->category = $validatedData['category'];
        $foods->save();

        // Redirect the user to the food item details page with a success message
        return redirect()->route('foods.store', $food)->with('success', 'Food item updated successfully!');
    }

    public function destroy(Foods $food)
    {
        // Delete the food item from the database
        $food->delete();

        // Redirect the user to the food items list page with a success message
        return redirect()->route('foods.index')->with('success', 'Food item deleted successfully.');
    }
}

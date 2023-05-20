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

    public function index()
    {
        $clothes = Clothes::all(); // Retrieve all clothes from the database
    
        return view('clothes.index', compact('clothes'));
    }

    public function edit(Clothes $clothes)
    {
        // Retrieve the clothes item from the database
        // and pass it to the view for editing
        return view('clothes.edit', compact('clothes'));
    }

    public function update(Request $request, Clothes $clothes)
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Delete the old clothes item image if a new image is uploaded
        if ($request->hasFile('image')) {
            $this->deleteClothesImage($clothes);
        }

        $clothes->name = $validatedData['name'];
        $clothes->type = $validatedData['type'];
        $clothes->color = $validatedData['color'];
        $clothes->size = $validatedData['size'];
        $clothes->brand = $validatedData['brand'];
        $clothes->price = $validatedData['price'];
        $clothes->description = $validatedData['description'];
        $clothes->category = $validatedData['category'];

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$validatedData['image']->extension();  
            $validatedData['image']->move(public_path('images'), $imageName);
            $clothes->image_url = $imageName;
        }

        $clothes->save();

        // Redirect the user to the clothes items list page with a success message
        return redirect()->route('clothes.index')->with('success', 'Clothes item updated successfully!');
    }

    public function destroy(Clothes $clothes)
    {
        // Delete the clothes item from the database
        $clothes->delete();

        // Redirect the user to the clothes items list page with a success message
        return redirect()->route('clothes.index')->with('success', 'Clothes item deleted successfully.');
    }

    private function deleteClothesImage(Clothes $clothes)
    {
        // Delete the old clothes item image from the storage
        $imagePath = public_path('images/'.$clothes->image_url);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}

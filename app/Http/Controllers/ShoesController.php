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

        // create new shoes product
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
        return redirect()->back()->with('success', 'Shoes product created successfully!');
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
        $shoes = Shoes::all(); // Retrieve all shoes from the database

        return view('shoes.index', compact('shoes'));
    }

    public function edit(Shoes $shoes)
    {
        // Retrieve the shoes item from the database
        // and pass it to the view for editing
        return view('shoes.edit', compact('shoes'));
    }

    public function update(Request $request, Shoes $shoes)
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

        // Delete the old shoes item image if a new image is uploaded
        if ($request->hasFile('image')) {
            $this->deleteShoesImage($shoes);
        }

        $shoes->name = $validatedData['name'];
        $shoes->type = $validatedData['type'];
        $shoes->color = $validatedData['color'];
        $shoes->size = $validatedData['size'];
        $shoes->brand = $validatedData['brand'];
        $shoes->price = $validatedData['price'];
        $shoes->description = $validatedData['description'];
        $shoes->category = $validatedData['category'];

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$validatedData['image']->extension();  
            $validatedData['image']->move(public_path('images'), $imageName);
            $shoes->image_url = $imageName;
        }

        $shoes->save();

        // Redirect the user to the shoes items list page with a success message
        return redirect()->route('shoes.index')->with('success', 'Shoes item updated successfully!');
    }

    public function destroy(Shoes $shoes)
    {
        // Delete the shoes item from the database
        $shoes->delete();

        // Redirect the user to the shoes items list page with a success message
        return redirect()->route('shoes.index')->with('success', 'Shoes item deleted successfully.');
    }

    private function deleteShoesImage(Shoes $shoes)
    {
        // Delete the old shoes item image from the storage
        $imagePath = public_path('images/'.$shoes->image_url);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}

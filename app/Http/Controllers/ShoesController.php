<?php

namespace App\Http\Controllers;
use App\Models\Shoes;
use Illuminate\Http\Request as LaravelRequest;




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
        'image_url' => 'nullable|url',
        'category' => 'required|string|max:255',
    ]);

    // create new shoes product
    $clothes = new Shoes;
    $clothes->name = $validatedData['name'];
    $clothes->type = $validatedData['type'];
    $clothes->color = $validatedData['color'];
    $clothes->size = $validatedData['size'];
    $clothes->brand = $validatedData['brand'];
    $clothes->price = $validatedData['price'];
    $clothes->description = $validatedData['description'];
    $clothes->image_url = $validatedData['image_url'];
    $clothes->category = $validatedData['category'];
    $clothes->save();

    // redirect back to form with success message
    return redirect()->back()->with('success', 'Clothes product created successfully!');
}

}

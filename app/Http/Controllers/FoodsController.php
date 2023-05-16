<?php

namespace App\Http\Controllers;
use App\Models\Foods;
use Illuminate\Http\Request as LaravelRequest;




use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function store(Request $request)
{
    // validate form input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'quantity' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'image_url' => 'nullable|url',
        'category' => 'required|string|max:255',
    ]);

    // create new foods product
    $clothes = new Foods;
    $clothes->name = $validatedData['name'];
    $clothes->type = $validatedData['type'];
    $clothes->quantity = $validatedData['quantity'];
    $clothes->price = $validatedData['price'];
    $clothes->description = $validatedData['description'];
    $clothes->image_url = $validatedData['image_url'];
    $clothes->category = $validatedData['category'];
    $clothes->save();

    // redirect back to form with success message
    return redirect()->back()->with('success', 'Clothes product created successfully!');
}

}

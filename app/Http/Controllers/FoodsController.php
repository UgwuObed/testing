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
        'category' => 'required|string|max:255',
    ]);



    // create new foods product
    $foods = new Foods;
    $foods->name = $validatedData['name'];
    $foods->type = $validatedData['type'];
    $foods->quantity = $validatedData['quantity'];
    $foods->price = $validatedData['price'];
    $foods->description = $validatedData['description'];
    $foods->category = $validatedData['category'];
    $foods->save();

    // redirect back to form with success message
    return redirect()->back()->with('success', 'Product created successfully!');
}

}

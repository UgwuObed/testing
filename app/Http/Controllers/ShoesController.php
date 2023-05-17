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
        'category' => 'required|string|max:255',
    ]);


    // create new shoes product
    $shoes = new Shoes;
    $shoes ->name = $validatedData['name'];
    $shoes ->type = $validatedData['type'];
    $shoes ->color = $validatedData['color'];
    $shoes ->size = $validatedData['size'];
    $shoes ->brand = $validatedData['brand'];
    $shoes ->price = $validatedData['price'];
    $shoes ->description = $validatedData['description'];
    $shoes ->category = $validatedData['category'];
    $shoes ->save();

    // redirect back to form with success message
    return redirect()->back()->with('success', 'Clothes product created successfully!');
}

}

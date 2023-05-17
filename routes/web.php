<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ShoesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/clothes', [ClothesController::class, 'store'])->name('clothes.store');
Route::post('/shoes', [ShoesController::class, 'store'])->name('shoes.store');
Route::post('/foods', [FoodsController::class, 'store'])->name('foods.store');

//image upload 
Route::post('/upload', [ClothesController::class, 'uploadImage'])->name('clothes.upload');
Route::post('/clothes/upload-image', [ClothesController::class, 'uploadImage'])->name('clothes.upload-image');




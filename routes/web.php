<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ShoesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;

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




Route::middleware('web')->group(function () {
    // Register routes
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    // Profile routes
    Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
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

Route::post('/upload', [FoodsController::class, 'uploadImage'])->name('foods.upload');
Route::post('/foods/upload-image', [FoodsController::class, 'uploadImage'])->name('foods.upload-image');

Route::post('/upload', [ShoesController::class, 'uploadImage'])->name('shoes.upload');
Route::post('/shoes/upload-image', [ShoesController::class, 'uploadImage'])->name('shoes.upload-image');

//get product route 
Route::get('/clothes', 'App\Http\Controllers\ClothesController@index')->name('clothes.index');
Route::get('/foods', 'App\Http\Controllers\FoodsController@index')->name('foods.index');
Route::get('/shoes', 'App\Http\Controllers\ShoesController@index')->name('shoes.index');


// foods route for delete, update and edit
Route::get('/foods', [FoodsController::class, 'index'])->name('foods.index');
Route::get('/foods/{food}/edit', [FoodsController::class, 'edit'])->name('foods.edit');
Route::put('/foods/{food}', [FoodsController::class, 'update'])->name('foods.update');
Route::delete('/foods/{food}', [FoodsController::class, 'destroy'])->name('foods.destroy');

// clothes route for delete, update and edit
Route::get('/clothes', [ClothesController::class, 'index'])->name('clothes.index');
Route::get('/clothes/{clothes}/edit', [ClothesController::class, 'edit'])->name('clothes.edit');
Route::put('/clothes/{clothes}', [ClothesController::class, 'update'])->name('clothes.update');
Route::delete('/clothes/{clothes}', [ClothesController::class, 'destroy'])->name('clothes.destroy');

// shoes route for delete, update and edit
Route::get('/shoes', [ShoesController::class, 'index'])->name('shoes.index');
Route::get('/shoes/{shoes}/edit', [ShoesController::class, 'edit'])->name('shoes.edit');
Route::put('/shoes/{shoes}', [ShoesController::class, 'update'])->name('shoes.update');
Route::delete('/shoes/{shoes}', [ShoesController::class, 'destroy'])->name('shoes.destroy');

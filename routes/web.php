<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('products', ProductsController::class);
// Route::resource('inventory', InventoryController::class);

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');             // index page/view
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');      // create page/view
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');           // store function
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');    // show page/view
Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');  // edit page
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');     // update function
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');     // delete 


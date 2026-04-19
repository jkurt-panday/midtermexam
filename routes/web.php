<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
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

// for Student CRUD activity
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
// Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
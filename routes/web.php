<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\Suppliers_MaterialsController;
use App\Http\Controllers\MachineryController;


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
    return view('auth.register');
});

Route::get('/contracts', function () {
    return view('contracts');
})->middleware(['auth', 'verified'])->name('contratos');

Route::get('/suppliers', function () {
    return view('suppliers');
})->middleware(['auth', 'verified'])->name('proveedores');

Route::get('/materials', function () {
    return view('materials');
})->middleware(['auth', 'verified'])->name('materiales');

Route::get('/machinery', function () {
    return view('machinery');
})->middleware(['auth', 'verified'])->name('maquinarias');

Route::get('/suppliers', [SuppliersController::class, 'index'])->middleware(['auth', 'verified'])->name('proveedores');

Route::get('/materials', [MaterialsController::class, 'index'])->middleware(['auth', 'verified'])->name('materiales');

Route::post('/materials', [MaterialsController::class, 'store'])->name('materials.store');

Route::post('/machinery', [MachineryController::class, 'store'])->name('machinery.store');

Route::post('/suppliers', [SuppliersController::class, 'store'])->name('suppliers.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

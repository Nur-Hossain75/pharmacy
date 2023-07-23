<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('home.page');
Route::get('/add-product', [HomeController::class,'add'])->name('add.product');
Route::post('/upload-product', [HomeController::class,'upload'])->name('upload.product');
Route::get('/manage-product', [HomeController::class,'manage'])->name('manage.product');
Route::get('/delete-product{id}', [HomeController::class,'delete'])->name('product.delete');
Route::get('/edit-product{id}', [HomeController::class,'edit'])->name('product.edit');
Route::post('/update-product', [HomeController::class,'update'])->name('update.product');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('Admin.dashboard');
});
Route::get('/category', function () {
    return view('Admin.category');
});
Route::get('image-upload', [ImageController::class, 'index']);
Route::post('image-upload', [ImageController::class, 'store'])->name('image.store');

require __DIR__.'/auth.php';

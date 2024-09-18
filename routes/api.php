<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\User\UserController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');
Route::get('/admin/',function(){
    return view('Admin.blank_page');
});
Route::get('/supervisor/',function(){
    return view('Supervisor.blank_page');
});
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    // Other admin routes...
});

Route::middleware(['auth:api', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);
    // Other user routes...
});

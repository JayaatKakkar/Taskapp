<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Api\AuthController;
// use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\RoleMiddleware;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::get('register',function(){return view('register');});
Route::get('login',function(){return view('login');});

Route::post('registeruser',[AuthController::class,'register']);
Route::post('loginuser',[AuthController::class,'login']);

// Route::middleware('auth:api')->group(function () {
//     Route::middleware(['role:admin'])->get('/admin-dashboard', function () {
//         return response()->json(['message' => 'Welcome Admin']);
//     });

//     Route::middleware(['role:user'])->get('/user-dashboard', function () {
//         return response()->json(['message' => 'Welcome User']);
//     });

//     Route::middleware(['role:supervisor'])->get('/supervisor-dashboard', function () {
//         return response()->json(['message' => 'Welcome Supervisor']);
//     });
// });

Route::middleware(['auth:api',RoleMiddleware::class.':admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard']);
    Route::get('/project', [AdminController::class, 'dashboard']);
    Route::get('/projtask', [AdminController::class, 'dashboard']);
    Route::get('/activity', [AdminController::class, 'dashboard']);
    // Other admin routes...
});

Route::middleware(['auth:api', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);
    // Other user routes...
});

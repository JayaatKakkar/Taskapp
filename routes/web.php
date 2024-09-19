<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin',function(){
    return view('Admin.blank_page');
});
// Route::get('/register',function(){
//     return view('register');
// });
Route::get('/supervisor',function(){
    return view('Supervisor.blank_page');
});
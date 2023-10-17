<?php

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/couponHistory', function () {
    return view('couponHistory');
});

Route::get('/add_category', function () {
    return view('add_category');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/add_slider', function () {
    return view('add_slider');
});

Route::get('/slider', function () {
    return view('slider');
});


Route::get('/add_notification', function () {
    return view('add_notification');
});

Route::get('/notificationList', function () {
    return view('notificationList');
});



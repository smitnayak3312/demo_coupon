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

        Route::get('/category','App\Http\Controllers\Admin\CategoryController@CategoryList')->name('category');
        Route::get('/add_category','App\Http\Controllers\Admin\CategoryController@CategoryAdd')->name('add_category');
        Route::post('/add_category/save','App\Http\Controllers\Admin\CategoryController@CategorySave')->name('add_category_save');
        /*Route::get('/amenities/edit/{id}','App\Http\Controllers\MasterAdmin\CategoryController@AmenitiesEdit')->name('amenitiesedit');
        Route::post('/amenities/update','App\Http\Controllers\MasterAdmin\CategoryController@AmenitiesUpdate')->name('amenitiesupdate');
        Route::post('/amenities/delete','App\Http\Controllers\MasterAdmin\CategoryController@AmenitiesDelete')->name('amenitiesdelete');
        Route::post('/amenities','App\Http\Controllers\MasterAdmin\CategoryController@AmenitiesGetList')->name('amenitiesgetlist');*/

/*Route::get('/add_category', function () {
    return view('add_category');
});*/



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


Route::get('/add_message', function () {
    return view('add_message');
});

Route::get('/importantList', function () {
    return view('importantList');
});

Route::get('/showRatings', function () {
    return view('showRatings');
});

Route::get('/couponList', function () {
    return view('couponList');
});

Route::get('/withdrawal', function () {
    return view('withdrawal');
});



Route::get('/withdrawalList', function () {
    return view('withdrawalList');
});

Route::get('/add_user', function () {
    return view('add_user');
});

Route::get('/userList', function () {
    return view('userList');
});

Route::get('/add_vendor', function () {
    return view('add_vendor');
});

Route::get('/vendorList', function () {
    return view('vendorList');
});

Route::get('/add_offer', function () {
    return view('add_offer');
});


Route::get('/offerList', function () {
    return view('offerList');
});

Route::get('/supportlist', function () {
    return view('supportlist');
});


Route::get('/introscreenList', function () {
    return view('introscreenList');
});



Route::get('/coupontypeList', function () {
    return view('coupontypeList');
});

Route::get('/appsettings', function () {
    return view('appsettings');
});


Route::get('/tnc', function () {
    return view('tnc');
});

Route::get('/privacy', function () {
    return view('privacy');
});


Route::get('/aboutus', function () {
    return view('aboutus');
});

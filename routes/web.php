<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['middleware'=>'auth:admin'], function () {
    Route::get('/assets/images/{filename}', [App\Http\Controllers\Front\StorageFileController::class,'getFile']);
Route::get('/assets/images/images/{filename}',[App\Http\Controllers\Admin\CategoriesController::class,'uploadFile']);
});

Route::get('/profile/{filename}',[App\Http\Controllers\Admin\CategoriesController::class,'getfile'])->name('file')->middleware('auth:admin');
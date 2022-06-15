<?php

use App\Http\Controllers\MovieController;
use App\Models\Movies;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index');

Route::middleware(['auth', 'chkAdmin'])-> group(function(){

    Route::get('/admin/home', 'App\Http\Controllers\HomeController@adminindex');

    Route::get('/admin/viewBooks', 'App\Http\Controllers\BookController@show');
    Route::get('/admin/{id}/review', 'App\Http\Controllers\BookController@review');
    
    Route::post('/admin/addBooks', 'App\Http\Controllers\BookController@addBook');
    
    Route::get('/admin/addBooks', function(){
        return view('admin.addBooks');
    });

    Route::get('/admin/{id}/profile', 'App\Http\Controllers\UserController@viewprofile');
    Route::get('/admin/users', 'App\Http\Controllers\UserController@show');

    Route::get('/admin/approveOrders/{id}', 'App\Http\Controllers\OrderController@approve');

    Route::get('/admin/aboutUs', function(){
        return view('admin.aboutUs');
    });
});

Route::get('/aboutUs', function(){
    return view('aboutUsUser');
});


Route::get('/{id}/profile', 'App\Http\Controllers\UserController@userviewprofile');
Route::get('/viewBooks/{id}', 'App\Http\Controllers\BookController@bookdetails');
Route::get('/allBooks', 'App\Http\Controllers\BookController@usershow');
// Route::get('/bookOrders/{id}/{book_id}', 'App\Http\Controllers\OrderController@bookorder');
Route::get('/bookOrders/{id}/{book_id}', 'App\Http\Controllers\OrderController@addorder');
Route::post('/viewBooks/{id}/{user_id}', 'App\Http\Controllers\BookController@addreview');

Route::get('layout', function(){
    return view('layouts.layout');
});



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hi', function () {
    return 'HI!';
});

Route::get('bye', function () {
    return view('bye.bye');
});

Route::get('byebye', 'ByeController@doneMethod');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

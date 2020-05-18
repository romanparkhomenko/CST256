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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Hello
Route::get('/hello', function () {
    return 'Hello World';
});

// Hello World php file
Route::view('/helloworld', 'helloworld');

// Test controller test.
Route::get('/test', 'TestController@test2');

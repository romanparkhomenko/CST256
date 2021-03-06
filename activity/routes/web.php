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
    return view('index');
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

Route::post('/whoami','WhatsMyNameController@index');

Route::get('/askme', function () { return view('whoami'); });

Route::get('/login', function () { return view('login'); });

Route::get('/login2', function () { return view('login2'); });

Route::post('/dologin','LoginController@index');

Route::get('/login3', function () { return view('login3'); });

Route::post('/dologin3','Login3Controller@index');

Route::post('/addOrder','Login3Controller@addOrder');

Route::resource('/usersrest', 'UsersRestController');
Route::get('/restclient', 'RestClientController@index');
Route::get('/loggingservice','TestLoggingController@index');

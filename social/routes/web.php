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
Route::get('/myprofile', 'HomeController@myprofile')->name('myprofile');

// Admin
Route::get('/admin', 'AdminController@index')->name('admin');

// Hello
Route::get('/hello', function () {
    return 'Hello World';
});

// Hello World php file
Route::view('/helloworld', 'helloworld');

// Test controller test.
Route::get('/test', 'TestController@test2');

Route::post('/updateProfile','HomeController@updateProfile');

// ADMIN CONTROLS
Route::get('/admin/{id}', 'AdminController@editUser')->name('editUser');
Route::post('/admin/{id}/harddelete', 'AdminController@hardDelete')->name('hardDeleteUser');
Route::post('/admin/{id}/softdelete', 'AdminController@softDelete')->name('softDeleteUser');

// JOB CONTROLS
Route::get('/admin/jobs/{id}', 'AdminController@editJob')->name('editJob');
Route::post('/admin/{id}/harddeletejob', 'AdminController@hardDeleteJob')->name('hardDeleteJob');
Route::post('/admin/{id}/softdeletejob', 'AdminController@softDeleteJob')->name('softDeleteJob');
Route::post('/addNewJob','HomeController@addJob')->name('addNewJob');
Route::post('/updateJob','JobController@updateJob')->name('updateJob');



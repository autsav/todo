<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/loggedin', 'App\Http\Controllers\TasksController@index');


Auth::routes(['verify' => true]);

Route::middleware(['auth','verified'])->group(function() {
    Route::get('/task', 'App\Http\Controllers\TasksController@add');
    Route::post('/task','App\Http\Controllers\TasksController@create');
    
    Route::get('/task/{task}','App\Http\Controllers\TasksController@edit');
    Route::post('/task/{task}','App\Http\Controllers\TasksController@update');

});









// Route::get('/', 'TasksController@index');

// Auth::routes();

// Route::get('/task', 'TasksController@add');
// Route::post('/task','TasksController@create');

// Route::get('/task/{task}','TasksController@edit');
// Route::post('/task/{task}','TasksController@update');
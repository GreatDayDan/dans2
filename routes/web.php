<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
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
    log::debug('gdd 01 Route::get(/,  function () {return view(welcome');
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Auth::routes();
Route::get('/home3', 'HomeController@index');
Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home1', function () {
    log::debug('gdd 02 Route::get(/home,  function () {return view(welcome');
    return view('welcome');
});

Route::get('/event', function () {
    log::debug('gdd 03 Route::get(/event,  function () {return view(eventsdd)');
    return view('event');
});
Route::get('/events', function () {
    log::debug('gdd 031 Route::get(/events,  function () {return view(eventsdd)');
    return view('events');
});
//
//Route::resource('/events', 'EventController');


Route::get('/about', function () {
   log::debug('gdd 03.1 Route about');
   return view('about');
});

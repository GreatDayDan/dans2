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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/home', function () {
//    log::debyg('gdd 02 Route::get(/home,  function () {return view(welcome');
//    return view('home');
//});

Route::get('/events', function () {
    log::debug('gdd 03 Route::get(/events,  function () {return view(eventsdd)');
    return view('eventsdd');
});
//
//Route::resource('/events', 'EventController');

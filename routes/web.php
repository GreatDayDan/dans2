<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Auth::routes();
Route::get('/home', function () {
    log::debug('gdd 02 Route::get(/home,  function () {return view(welcome');
    return view('welcome');
});

Route::get('/', function () {
    log::debug('gdd 01 Route::get(/,  function () {return view(welcome');
    return view('welcome');
});
Route::post('/store/{id}', 'App\Http\Controllers\EventController@store');
Route::post('/save',  'App\Http\Controllers\EventController@save');
Route::get('/events', 'App\Http\Controllers\EventController@index');

Route::get('/front', function () {
    log::debug('gdd 04 Route::get(/front,  function () {return view(front)');
    return view('front');
});

Route::get('/dashboard', function () {
    log::debug('gdd 05 Route::get(/dashboard,  function () {return view(dashboard)');
    return view('dashboard');
});

Route::get('/about_mo', function () {
    log::debug('gdd 03.1 Route about_mo');
    return view('about');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');


//Route::get('/home2/{id}', [App\Http\Controllers\HomeController::class, 'index'])->name('about');

//Route::get('/home3/{id}', 'App\Http\Controllers\HomeController@show');
//Route::get('/home4/', [App\Http\Controllers\HomeController::class, 'show'])->name('showelcome');


//Route::get('/event', function () {
//    log::debug('gdd 03.1 Route::get(/event,  function () {return view(event)');
//    return view('event');
//});

//Route::get('/event2', function () {
//    log::debug('gdd 03.2 Route::get(/event,  function () {return view(event)');
//    return view('event');
//});
//Route::get('/event3', 'App\Http\Controllers\EventController@index');
//Route::get('/event4', 'App\Http\Controllers\EventController@show');

//Route::get('/events', function () {
//    log::debug('gdd 031 Route:
//    :get(/events,  function () {return view(events)');
//    return view('events');
//});
//
//Route::resource('/events', 'EventController');



//Route::resource('events2', 'EventController');

//Route::resource('home5', 'HomeController');

//Route::get('/home6', function()
//{
//    log::debug('gdd 06.1 Route home6');
//    return View::make('pages.home');
//});
//Route::get('about_mo', function()
//{
//    log::debug('gdd 06.2 Route about_mo');
//    return View::make('pages.about');
//});
//Route::get('projects', function()
//{
//    log::debug('gdd 06.3 Route projects');
//    return View::make('pages.projects');
//});
//Route::get('contact', function()
//{
//    log::debug('gdd 06.4 Route contact');
//    return View::make('pages.contact');
//});

//Route::resource('HelloWorld', 'HelloWorldController@index');
//
//Route::get('blade', function () {
//    log::debug('gdd 08.1 Route blade');
//    return view('child');
//});

//Route::get('post', function (){
//    echo('post');
//  log::debug('gdd 09.1 Route post');
//  return view('post');
//});

//Route::get('/post/{$post}', 'PostController@show');

//Route::get('items/get-item-status', array('as' => 'getItemStatus', 'uses' =>  'ItemsController@getItemStatus'));
//Route::get('test/{var?}', 'TestController@index');

//Route::get('test', function() {
//
//    $test = new test;
//
//    dd($test);
//
//    Log::info($test); // will show in your log
//
//    var_dump($test);
//
//});
//route search
//Route::get('/search',['uses' => 'SearchController@getSearch','as' => 'search']);
//Route::get('/{student}',['uses' => 'HomeController@student','as' => 'student.show']);

//Route::get('/home8', [HomeController::class, 'index'])->name('home');
//Route::get('/home9', function () {
//    log::debug('gdd 09 Route::get(/,  function () {return view(welcome');
//    return view('menu');
//});



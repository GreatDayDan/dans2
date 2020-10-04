<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        Log::info('gdd 055 __construct HomeController');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Log::info('gdd 056 index HomeController');
        return view('home');

    }

    public function show($id){
//{   alert('event show() EventController  .$event->id);');
        Log::info('gdd 06.1 home show() HomeController'  .$id);
        $user=\DB::table('users')->where('id',$id)->first();
        dd($user);
//    if (! array_key_exists($post, 'posts')) {
//        abort(404, 'Oops, no such record');
//    }

        return view('user',['user'=>$user]);
//    $post = Post::where('post_id', $id)->first();

//    return View::make('posts.show', compact('post'));
    }
    public function showWelcome()
    {
        return View::make('home.welcome');
    }


}

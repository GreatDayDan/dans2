<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show($slug)

    {
        echo('post');
        dd($slug);
        Log::info('gdd 09.1 post show() Posts' . $slug->id);
        if (!\View::exists('post')) {
            abort(404, 'view "post" cannot be found');
            log::debug('gdd 09.1.1 view "post" cannot be found');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function index($var = null)
    {
        $test = new Item;

        dd($var);
        dd($test);

        Log::info($var);
        Log::info($test);

        var_dump($test);
        var_dump($var);
    }
}

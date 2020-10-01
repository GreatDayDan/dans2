<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{

    public function index()
    {
        log::debug('gdd 07.0 HelloWorld');
        $data['brand'] = 'Wicked Awesome Website';
        $data['navsearch'] = 'Search Now!';

        $data['variableone'] = 'The value of variable one.';
        $data['variabletwo'] = 'The value of variable two.';
        $data['variablethree'] = 'The value of variable three.';

        $data['footer'] = 'Trademark, Copyright, and all that Jazz';

        return view('helloworld')->with($data);
    }

}

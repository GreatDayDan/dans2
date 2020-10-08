<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Search extends Controller
{
    public function getSearch()
    {
        //get keywords input for search
        $keyword=  Input::get('q');

        //search that student in Database
        $students= Student::find($keyword);

        //return display search result to user by using a view
        return View::make('selfservice')->with('student', $students);
    }
}

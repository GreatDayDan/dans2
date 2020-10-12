<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch()
    {
        //get keywords input for search
        $keyword=  Input::get('q');

        //search that student in Database
        $student= Student::find($keyword);

        //redirect directly to student.show route with student detail
        return Redirect::route('student.show', array('student' => $student));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){

        $people = [

            'Taylor Otwell', 'Dayle Rees', 'Eric Barnes'
        ];


        return view('pages.about',compact('people'));
    }
}

// One Way to Pass  Data to the View
/*
return view('pages.about')->with([

    'first' => 'Pedro',
    'last' 
    */

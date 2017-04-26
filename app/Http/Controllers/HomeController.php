<?php

namespace App\Http\Controllers;

use App\Company;
use App\Survey;
use App\User;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $cs = User::find(1)->surveys;
//        dd($cs);

//        $cs = User::find(1)->surveys;
//
//        foreach($cs as $c){
//            dd($c->questions);
//        }

        return view('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Company;
use App\Question;
use App\Survey;
use App\User;
use Carbon\Carbon;
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
        $companies = Company::all();
        $now = Carbon::now()->format('Y-m-d H:i:s');

//        foreach($companies as $company){
//            dd($company->surveys);
//        }

        return view('surveys.survey-home', compact('companies', 'now'));
    }
}

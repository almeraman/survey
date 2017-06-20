<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{

    public function getMySurvey(){
        //dd(Auth::user()->surveys->first()->questions->find(4)->multi_choice);
    }

    public function getSurvey(Request $request){

        $survey = Survey::find($request->id);
        //dd($survey->questions);
        //        $cs = User::find(1)->surveys;
//        dd($cs);
//        $q = Question::find(4);
//        dd($q->multi_choice);
//        $cs = User::find(1)->surveys;
//
//        foreach($cs as $c){
//            dd($c->questions);
//        }

        return view('surveys.survey-current');
    }

    public function postSurvey(Request $request){
        $survey_id = $request->input('id');
        $user_id = Auth::user();
        $user_id->surveys()->attach($survey_id);
    }

}

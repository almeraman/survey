<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Company;
use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{

    public function getMySurvey(){
        //dd(Auth::user()->surveys->first()->questions->find(4)->multi_choice);
        //dd(Auth::user()->surveys->first()->company_id);
        $surveys = Auth::user()->surveys;
        foreach($surveys as $survey){
            $survey['company_name'] = Company::find($survey->company_id)->first()->name;
        }
        $companies = Company::all();
        return view('layouts.my_surveys', compact('surveys', 'companies'));
    }

//    public function getSurvey(Request $request){
//
//        $survey = Survey::find($request->id);
//        //dd($survey->questions);
//        //        $cs = User::find(1)->surveys;
////        dd($cs);
////        $q = Question::find(4);
////        dd($q->multi_choice);
////        $cs = User::find(1)->surveys;
////
////        foreach($cs as $c){
////            dd($c->questions);
////        }
//
//        return view('surveys.survey-current');
//    }

    public function postSurvey(Request $request){
        $survey_id = $request->input('id');
        $user_id = Auth::user();
        $user_id->surveys()->attach($survey_id);
    }

    public function getTakeSurvey($id){

        $current_survey = Survey::find($id);
        $num_questions = count($current_survey->questions);

        return view('surveys.survey-current', compact('current_survey', 'num_questions'));
    }

    public function postAnswer(Request $request){
        //dd($request->input('answer'));
        $answer = new Answer();
        $answer->question_id = $request->input('question_id');
        $answer->user_id = Auth::user()->id;
        $answer->answer = $request->input('answer');
        $answer->survey_id = $request->input('survey_id');
        $answer->save();
    }

}

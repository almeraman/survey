<?php

namespace App\Http\Controllers;

use App\OnceAnswer;
use App\Survey;
use Illuminate\Http\Request;
use App\Http\Requests\AnswersRequest;

class OnceOffController extends Controller
{
    public function getOnceOff(Request $request){

        $current_survey = Survey::find($request->survey_id);
        $num_questions = count($current_survey->questions);

        return view('guest.once_off', compact('current_survey', 'num_questions'));
    }

    public function postOnceAnswer(AnswersRequest $request){
        //     dd($request->all());
        foreach($request->except('_token', 'survey_id') as $key => $value){

            $tmp = explode('_', $key);
            $ans = $value;

            if($tmp[0] == 'answer'){
                $q_id = $tmp[1];
            } elseif($tmp[0] == 'multi'){
                $q_id = $tmp[2];
            }

            $answer_array [] = array('question_id' => $q_id, 'answer' => $ans, 'survey_id' => $request->survey_id);
        }

        OnceAnswer::insert($answer_array);

        return redirect()->route('thank_you');

    }

    public function getThankYou(){
        return view('guest.thank_you');
    }

    public function getNotValid(){
        return view('guest.not_valid');
    }

}

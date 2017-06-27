<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index');
    Route::get('/home/my_survey', ['as' => 'my_survey', 'uses' => 'SurveyController@getMySurvey']);
    Route::get('/home/survey/{id}', ['as' => 'survey', 'uses' => 'SurveyController@getSurvey']);
    Route::post('/home/survey', ['as' => 'survey', 'uses' => 'SurveyController@postSurvey']);
    Route::get('/home/take-survey/{id}', ['as' => 'take-survey', 'middleware' => 'view_survey', 'uses' => 'SurveyController@getTakeSurvey']);
    Route::post('/home/answer', ['as' => 'answer', 'uses' => 'SurveyController@postAnswer']);
    Route::get('/home/account', ['as' => 'account', 'uses' => 'HomeController@getAccount']);
    Route::post('/home/post-balance', ['as' => 'post-balance', 'uses' => 'SurveyController@postBalance']);

});

Route::get('/SuperSurvey/once_off/{survey_id}', ['as' => 'once_off', 'middleware' => 'valid_survey', 'uses' => 'OnceOffController@getOnceOff']);
Route::post('/SuperSurvey/once_off/answer', ['as' => 'once_answer', 'uses' => 'OnceOffController@postOnceAnswer']);
Route::get('/SuperSurvey/thank_you', ['as' => 'thank_you', 'uses' => 'OnceOffController@getThankYou']);
Route::get('/SuperSurvey/not_valid', ['as' => 'not_valid', 'uses' => 'OnceOffController@getNotValid']);
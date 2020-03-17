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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('questionnaires', 'QuestionnaireController');
Route::get('questionnaires/{questionnaire}/questions/create', 'QuestionController@create')->name('questionnaires.createQuestion');
Route::post('questionnaires/{questionnaire}/questions', 'QuestionController@store')->name('questionnaires.storeQuestion');
Route::get('questionnaires/{questionnaire}/questions', 'QuestionController@index')->name('questionnaires.getQuestions');
Route::get('questionnaires/{questionnaire}/questions/{question}', 'QuestionController@show')->name('questionnaires.showQuestions');
Route::get('questionnaires/{questionnaire}/questions/{question}/edit', 'QuestionController@edit')->name('questionnaires.editQuestions');
Route::patch('questionnaires/{questionnaire}/questions/{question}', 'QuestionController@update')->name('questionnaires.updateQuestions');
Route::get('surveys/{questionnaire}-{slug}', 'SurveyController@show')->name('surveys.take');
Route::post('surveys/{questionnaire}-{slug}', 'SurveyController@store')->name('surveys.store');
Route::delete('questions/{question}', 'QuestionController@destroy')->name('questions.destroy');

Route::get('pay', 'PayOrderController@store');
Route::get('channels', 'ChannelController@index');
Route::get('channels/posts/create', 'PostController@create');
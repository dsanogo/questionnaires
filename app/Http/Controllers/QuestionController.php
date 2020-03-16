<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestion;
use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Questionnaire $questionnaire)
    {
        $questions = $questionnaire->questions;
        return view('questionnaires.questions.index')->withQuestions($questions)->withQuestionnaire($questionnaire);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Questionnaire $questionnaire)
    {
        $question = new Question();
        $answers = [];
        return view('questionnaires.questions.create')->withQuestion($question)->withQuestionnaire($questionnaire)->withAnswers($answers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestion $request, Questionnaire $questionnaire)
    {
        $validated = $request->validated();
        try {

            DB::transaction(function () use ($validated, $questionnaire){
                $quest = $validated['question'];
                $question = $questionnaire->questions()->create($quest);

                if($question){
                    $answers = $validated['answers'];
                    $question->answers()->createMany($answers);
                }

                DB::commit();
            });
            
            return redirect()->route('questionnaires.getQuestions', $questionnaire->id);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Questionnaire $questionnaire)
    {
        return view('questionnaires.questions.show')->withQuestionnaire($questionnaire)->withQuestion($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire, Question $question)
    {
        $answers = $question->answers->toArray();
        return view('questionnaires.questions.edit')->withQuestion($question)->withQuestionnaire($questionnaire)->withAnswers($answers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestion $request, Questionnaire $questionnaire, Question $question)
    {
        $validated = $request->validated();
        try {

            DB::transaction(function () use ($validated, $questionnaire, $question){
                $quest = $validated['question'];
                $updated = $question->update($quest);

                if($updated){
                    $answers = $validated['answers'];
                    $question->answers()->updateMany($answers);
                }

                DB::commit();
            });
            
            return redirect()->route('questionnaires.getQuestions', $questionnaire->id);
        } catch (\Exception $ex) {
            DB::rollBack();
            dd($ex->getMessage());
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->load('answers');
        foreach ($question->answers as $answer) {
            $answer->delete();
        }

        $question->delete();

        return redirect()->back();
    }
}

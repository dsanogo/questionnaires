<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurvey;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurvey $request, Questionnaire $questionnaire)
    {
        $validated = $request->validated();
        try {

            DB::transaction(function () use ($validated, $questionnaire){
                $survey = $questionnaire->surveys()->create($validated['survey']);

                if($survey){
                    $survey->responses()->createMany($validated['responses']);
                }

                DB::commit();
            });

            return "Thanks for taking the survey";
            
            return redirect()->route('questionnaires.getQuestions', $questionnaire->id);
        } catch (\Exception $ex) {
            DB::rollBack();
            dd($ex->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers');
        return view('questionnaires.surveys.index')->withQuestionnaire($questionnaire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

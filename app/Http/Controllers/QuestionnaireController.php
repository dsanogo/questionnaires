<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionnaire;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{

    private $questionnaire;

    public function __construct(Questionnaire $questionnaire) {
        $this->middleware('auth');
        $this->questionnaire = $questionnaire;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questionnaire = new Questionnaire();
        return view('questionnaires.create', compact('questionnaire'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionnaire $request)
    {
        $validated = $request->validated();
        $questionnaire = auth()->user()->questionnaires()->create($validated);
        return redirect()->route('questionaires.show', $questionnaire->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaires.show')->withQuestionnaire($questionnaire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        return view('questionnaires.edit')->withQuestionnaire($questionnaire);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestionnaire $request, Questionnaire $questionnaire)
    {
        $validated = $request->validated();
        $this->questionnaire->updateQ($questionnaire->id, $validated);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}

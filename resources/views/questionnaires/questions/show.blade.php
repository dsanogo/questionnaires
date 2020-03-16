@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $questionnaire->title }}</h4>
                </div>

                <div class="card-body">
                    <p><strong>Purpose: </strong>{{$question->question}}</p>
                    <a href="{{route('questionnaires.edit', $questionnaire->id)}}" class="btn btn-dark">Edit new questionnaire</a>
                    <a href="{{route('questionnaires.createQuestion', $questionnaire->id)}}" class="btn btn-dark">Add New Question</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

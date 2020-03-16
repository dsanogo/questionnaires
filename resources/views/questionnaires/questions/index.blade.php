@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title}}</div>

                <div class="card-body">
                    <div>
                        <ul class="list-group">
                            @forelse ($questions as $question)
                                <li class="list-group-item"> {{ $question->question }}
                                    <a href="{{route('questionnaires.editQuestions', [$questionnaire->id, $question->id])}}">Edit</a>
                                </li>
                            @empty
                            <p class="alert alert-info">No Question Yet.</p>
                            @endforelse
                        </ul>
                    </div>

                    <div>
                        <a href="{{route('questionnaires.createQuestion', $questionnaire->id)}}" class="btn btn-dark float-right">Add Question</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

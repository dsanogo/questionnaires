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
                    <p><strong>Purpose: </strong>{{$questionnaire->purpose}}</p>
                    <a href="{{route('questionnaires.edit', $questionnaire->id)}}" class="btn btn-dark">Edit new questionnaire</a>
                    <a href="{{route('questionnaires.createQuestion', $questionnaire->id)}}" class="btn btn-dark">Add New Question</a>
                    <a href="{{route('questionnaires.getQuestions', $questionnaire->id)}}" class="btn btn-dark">View Questions</a>
                    @if (count($questionnaire->questions))
                        <a href="{{route('surveys.take', [$questionnaire->id, Str::slug($questionnaire->title)])}}" class="btn btn-dark">Take Survey</a>
                    @endif
                </div>
            </div>

            @forelse ($questionnaire->questions as $question)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>{{ $question->question }}
                            
                        </h4>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($question->answers as $answer)
                                <li class="list-group-flush list-group-item d-flex justify-content-between">
                                    <div>{{ $answer->answer }}</div>
                                    @if ($question->responses->count())
                                        <div class="font-weight-bold">{{ intval($answer->responses->count() * 100 / $question->responses->count()) }}%</div>
                                    @endif
                                </li>
                            @empty
                                <p>No Answers added</p>
                            @endforelse
                        </ul>
                    </div>

                    <div class="card-footer">
                        <form action="{{$question->deletePath()}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger float-right">DELETE</button>
                            <a class="btn btn-sm btn-outline-info float-right mr-2" href="{{route('questionnaires.editQuestions', [$questionnaire->id, $question->id])}}">EDIT</a>
                        </form>
                    </div>
                </div>
            @empty
            <div class="card">
                <div class="card-header">
                    <p class="alert alert-info">
                        NO QUESTIONS YET
                    </p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

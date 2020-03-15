@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questionnaire</div>

                <div class="card-body">
                    <h4>{{$questionnaire->title}}</h4>
                    <p>{{$questionnaire->purpose}}</p>
                    <a href="{{route('questionnaires.edit', $questionnaire->id)}}" class="btn btn-dark">Edit new questionnaire</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

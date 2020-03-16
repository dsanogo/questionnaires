@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Question</div>

                <div class="card-body">
                    <form action="{{route('questionnaires.updateQuestions', [$questionnaire->id, $question->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        @include('questionnaires.questions._form')

                        <div class="form-group">
                            <button class="btn btn-primary">Update Question</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

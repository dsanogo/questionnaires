@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Create new Question for <strong>{{ $questionnaire->title}}</strong></div>

                <div class="card-body">
                    <form action="{{route('questionnaires.storeQuestion', $questionnaire->id)}}" method="post">
                        @csrf
                        @include('questionnaires.questions._form')

                        <div class="form-group">
                            <button class="btn btn-primary">Create Question</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

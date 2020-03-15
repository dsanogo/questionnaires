@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Questionnaire</div>

                <div class="card-body">
                    <form action="{{route('questionnaires.update', $questionnaire->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        @include('questionnaires._form')

                        <div class="form-group">
                            <button class="btn btn-primary">Update Questionnaire</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

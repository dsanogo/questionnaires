@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $questionnaire->title }}</h4>
                    <p><strong>Purpose: </strong>{{$questionnaire->purpose}}</p>
                </div>

                <div class="card-body">
                    <form action="{{route('surveys.store', [$questionnaire->id, Str::slug($questionnaire->title)])}}" method="POST">
                        @csrf
                        @forelse ($questionnaire->questions as $key => $question)
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4><strong>Question #{{$key+1}}:</strong> {{ $question->question }}</h4>
                                </div>
            
                                <div class="card-body">
                                    @error("responses." . $question->id . '.answer_id')
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <ul class="list-group">
                                        @forelse ($question->answers as $answer)
                                            <label for="answer{{$answer->id}}">
                                                <li class="list-group-flush list-group-item">
                                                    <input type="radio" name="responses[{{$question->id}}][answer_id]" 
                                                        id="answer{{$answer->id}}" 
                                                        class="mr-2 @error('responses.' . $question->id . '.answer_id') is-invalid @enderror" 
                                                        value="{{$answer->id}}" 
                                                        {{old('responses.' . $question->id . '.answer_id') == $answer->id ? 'checked' : ''}}
                                                    >
                                                    {{ $answer->answer }}
                                                    <input type="hidden" name="responses[{{$question->id}}][question_id]" value="{{$question->id}}">
                                                </li>
                                                
                                            </label>
                                           
                                        @empty
                                            <p>No Answers added</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        @empty
                            <p class="alert alert-info">NO Questions</p>
                        @endforelse
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4><strong>Your information</h4>
                            </div>
        
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="survey[name]" id="name" class="form-control @error('survey.name') is-invalid @enderror" 
                                        autocomplete="off" 
                                        aria-describedby="nameHelp" 
                                        placeholder="Enter your name"
                                        value="{{ old('survey.name')}}">
                                    <small id="nameHelp" class="form-text text-muted">Please provide your name</small>
                                    @error('survey.name')
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="survey[email]" id="email" class="form-control @error('survey.email') is-invalid @enderror" 
                                        autocomplete="off" 
                                        aria-describedby="emailHelp" 
                                        placeholder="Enter your Email"
                                        value="{{ old('survey.email')}}">
                                    <small id="emailHelp" class="form-text text-muted">Please provide your email</small>
                                    @error('survey.email')
                                        <span class="invalid-feedback" role="alert" style="display: block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-dark float-right my-4">Submit Survey</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

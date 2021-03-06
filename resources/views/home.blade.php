@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <a href="{{route('questionnaires.create')}}" class="btn btn-dark my-3">Create new questionnaire</a>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h4>My Questionnaires</h4>
                    <example-component message="Hello laravel"></example-component>
                </div>

                <div class="card-body">
                    <div>
                        <ul class="list-group">
                            @forelse ($questionnaires as $questionnaire)
                            <li class="list-group-item list-group-flush">
                                <h4 style="display: inline-block">
                                        <a href="{{$questionnaire->path()}}">
                                            {{$questionnaire->title}}
                                        </a>
                                    </h4>
                                    <small>{{$questionnaire->purpose}}</small>

                                    <div class="mt-2">
                                        <small><strong>Share URL:</strong> {{$questionnaire->publicPath()}}</small>
                                        <p>
                                            <a href="{{$questionnaire->publicPath()}}" target="_blanc">Take now</a>
                                            <form action="{{$questionnaire->deletePath()}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger float-right">DELETE</button>
                                                <a class="btn btn-sm btn-outline-info float-right mr-2" href="{{route('questionnaires.edit', $questionnaire->id)}}">EDIT</a>
                                            </form>
                                        </p>
                                    </div>
                            </li>    
                            @empty
                                <p class="alert alert-info">No questionnaire Yet.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

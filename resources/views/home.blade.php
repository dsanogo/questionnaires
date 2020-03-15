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

                    <div>
                        @forelse ($questionnaires as $questionnaire)
                            <h4 style="display: inline-block">{{$questionnaire->title}}</h4>
                            <small>{{$questionnaire->purpose}}</small>
                        @empty
                            <p class="alert alert-info">No questionnaire Yet.</p>
                        @endforelse
                    </div>

                    <a href="{{route('questionnaires.create')}}" class="btn btn-dark">Create new questionnaire</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Questionnaire</div>

                <div class="card-body">
                    <form action="{{route('questionnaires.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                                autocomplete="off" 
                                aria-describedby="titleHelp" 
                                placeholder="Enter Title"
                                value="{{ old('title')}}">
                            <small id="titleHelp" class="form-text text-muted">Give your Questionnaire a brilliant title</small>
                            @error('title')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" name="purpose" id="purpose" class="form-control @error('purpose') is-invalid @enderror" 
                                autocomplete="off" 
                                aria-describedby="purposeHelp" 
                                placeholder="Enter Purpose"
                                value="{{ old('purpose')}}">
                            <small id="purposeHelp" class="form-text text-muted">Give your Questionnaire a brilliant purpose</small>
                            @error('purpose')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Create Questionnaire</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

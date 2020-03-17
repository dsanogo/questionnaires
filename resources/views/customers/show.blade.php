@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $customer->name }}</h4>
                </div>

                <div class="card-body">
                    <p><strong>Name: </strong>{{$customer->name}}</p>
                    <p><strong>Created By: </strong>{{$customer->user->email}}</p>
                    <p><strong>Last Updated: </strong>{{$customer->updated_at->diffForHumans()}}</p>
                    <a href="{{route('customers.index')}}" class="btn btn-dark">Back</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

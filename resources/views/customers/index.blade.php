@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h3>Customers</h3></div>

                <div class="card-body">
                    <div>
                        <ul class="list-group">
                            @forelse ($customers as $customer)
                                <li class="list-group-item d-flex justify-content-between align-items-center"> 
                                    <div><a href="{{$customer->showPath()}}">{{ $customer->name }}</a></div>
                                    <div class="font-weight-bold text-center">{{ $customer->active ? "Active" : "Inactive" }}</div>
                                </li>
                            @empty
                                <p class="alert alert-info">No Channel Yet.</p>
                            @endforelse
                            <div class="d-flex justify-content-center mt-4">{{ $customers->appends(request()->input())->links()}}</div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

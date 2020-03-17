@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h3>Create new POST</h3></div>

                <div class="card-body">
                    <div>
                       <form action="">
                           <div class="form-group">
                              @include('channels.partials._dropdown')
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

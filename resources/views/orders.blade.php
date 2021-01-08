@extends('layouts/app')
@section('content')
    
    <div>       
        <div class="row">
            <div class="col-md-6">
                <h2>Orders</h2>
            </div>
            <div class="col-md-6">
                <a href="/createorder" class="btn btn-primary">Add New Order</a>
            </div>
        </div>
        <Orderstable :orders="{{$orders}}"></Orderstable>
    </div>

@endsection
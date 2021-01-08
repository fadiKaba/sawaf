@extends('layouts/app')
@section('content')
    
    <h3>Add New Order</h3>
    <Createordertable :customers="{{$customers}}" :products="{{$products}}"></Createordertable>

@endsection
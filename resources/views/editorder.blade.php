@extends('layouts/app')
@section('content')
<Editorder 
:customers="{{$customers}}" 
:products="{{$products}}" 
:orderu="{{$order}}" 
:orderproducts="{{$orderproducts}}">
</Editorder>

@endsection
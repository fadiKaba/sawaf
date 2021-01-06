@extends('layouts/app')
@section('content')

<div class="row">
    <div class="col-md-6"><h1>Products</h1></div>
    <div class="col-md-6">
        <a href="/createproduct" class="btn btn-primary">Add New Product</a>
    </div>
</div>

<div class="mt-2 mt-md-4">
    <div class="row">
        @foreach($products as $product)
        <Product 
        productid="{{$product->id}}"
        productname="{{$product->ProductName}}" 
        unitprice="{{$product->UnitPrice}}"
        companyname="{{$product->supplier->CompanyName}}"
        ></Product>
        @endforeach 
    </div>
</div>

@endsection
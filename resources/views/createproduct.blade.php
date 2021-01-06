@extends('layouts/app')
@section('content')

<h3>Create New Product</h3>
<div class="border mt-md-3 p-2 p-md-4">
    <form action="{{route('addproduct')}}" method="POST"> 
            <div class="mb-3 ">
                <label for="product-name" class="form-label">Product Name</label>
                <input required name="productname" type="text" class="form-control" id="prduct-name" placeholder="..." value="{{old('productname')}}">
            </div>
            <div class="mb-3">
                <label for="product-name" class="form-label">Unit Price</label>
                <input name="unitprice" type="number" min="0" class="form-control" id="prduct-name" placeholder="0" value="0">
            </div>
            <select name="supplierid" class="form-select form-select-lg form-control mb-3" aria-label=".form-select-lg example">
                <option selected>Open this select menu</option>
                @foreach ($suppliers as $supplier)   
                <option value="{{$supplier->id}}">{{$supplier->CompanyName}}</option>
                @endforeach         
            </select>
            @csrf
            <button class="btn btn-primary">Save</button>
            <a href="/products" class="btn btn-secondary">Cancel</a>  
    </form>
</div>
    
@endsection
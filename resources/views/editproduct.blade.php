@extends('layouts/app')
@section('content')

<h3>Edit</h3>
<div class="border mt-md-3 p-2 p-md-4">
    <form action="{{route('updateproduct', ['productid' => $product->id])}}" method="POST"> 
            <div class="mb-3 ">
                <label for="product-name" class="form-label">Product Name</label>
                <input required name="productname" type="text" class="form-control" id="prduct-name" placeholder="..." value="{{old('productname', $product->ProductName)}}">
            </div>
            <div class="mb-3">
                <label for="product-name" class="form-label">Unit Price</label>
                <input name="unitprice" type="number" min="0" class="form-control" id="prduct-name" placeholder="0" value="{{old('unitprice', $product->UnitPrice)}}">
            </div>
            <select name="supplierid" class="form-select form-select-lg form-control mb-3" aria-label=".form-select-lg example">
                <option selected value="{{$product->SupplierId}}">{{$supplierName}}</option>
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
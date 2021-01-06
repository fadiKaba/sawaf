<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('/products', compact('products'));
    }

    public function create(){
        $suppliers = Supplier::all();
        return view('/createproduct', compact('suppliers'));
    }

    public function store(Request $request){
        
        
        $request->validate([
          'productname' => 'required',
          'supplierid' => 'required',
          'unitprice' => 'numeric|min:0'
        ]);

        Product::create([
            'ProductName' => $request->productname,
            'SupplierId' => $request->supplierid,
            'UnitPrice' => $request->unitprice
        ]);

        return redirect('/products')->with('success', 'saved');

    }

    public function edit($productid){
        $product = Product::findOrFail($productid);
        $suppliers = Supplier::All();
        $supplierName = Supplier::findOrFail($product->SupplierId)->CompanyName;
        return view('/editproduct', compact('product', 'suppliers', 'supplierName'));
    }
    
    public function update(Request $request, $productid){

        $request->validate([
            'productname' => 'required',
            'supplierid' => 'required',
            'unitprice' => 'numeric|min:0'
          ]);

        $product = Product::findOrFail($productid);
        $product->update([
            'ProductName' => $request->productname,
            'SupplierId' => $request->supplierid,
            'UnitPrice' => $request->unitprice
        ]);
        
        return redirect()->back()->with('success', 'updated successfully');
    }

}

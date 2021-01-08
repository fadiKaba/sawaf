<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Validator;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::with('customer')->get();
        return view('/orders', compact('orders'));
    }

    public function create(){
        $customers = Customer::all();
        $products = Product::all();
        return view('/createorder', compact('customers', 'products'));
    }

    // public function getOrders($customerId){
    //     // $customer = Customer::find($customerId);
    //     // $orders = $customer->orders;
    //     $orders = Order::where('CustomerId', $customerId)->with('products')->get();
    //     $products = Product::all();
    //     return $orders;
    // }

    public function store(Request $request){
        $data = [
            'CustomerId' => $request[0]['CustomerId'],
            'OrderNumber' => $request[0]['OrderNumber'],
            'OrderDate' => $request[0]['OrderDate']
             ];
        
        Validator::make($data, [
            'CustomerId' => [
                'required', 'numeric'
            ],
            'OrderNumber' => [
                
            ],
            'OrderDate' => [
                'required', 'date'
            ] 
        ])->validate();

        $order = Order::create([
         'OrderDate' => $data['OrderDate'],
         'OrderNumber' => $data['OrderNumber'],
         'CustomerId' => $data['CustomerId'],
         'TotalAmount' => 0
        ]);
        for($i = 0; $i < count((array)$request); $i++){   
        $order->products()->attach($request[$i]['ProductId'], ['Quantity' => $request[$i]['ProductQuantity'], 'UnitPrice' => 0] );
        }

        return 'success';
    }

    public function edit($orderId){
       $customers = Customer::all();
       $products = Product::all();
       $order = Order::where('id', $orderId)->with('customer')->first();
       $orderproducts = Order::find($orderId)->products;
       return view('/editorder', compact('customers', 'products', 'order', 'orderproducts'));
    }

    public function update(Request $request, $orderId){
        $data = [
            'CustomerId' => $request[0]['CustomerId'],
            'OrderNumber' => $request[0]['OrderNumber'],
            'OrderDate' => $request[0]['OrderDate']
             ];
        
        Validator::make($data, [
            'CustomerId' => [
                'required', 'numeric'
            ],
            'OrderNumber' => [
                
            ],
            'OrderDate' => [
                'required', 'date'
            ] 
        ])->validate();
        $order = Order::findOrFail($orderId);
        $order->update([
         'OrderDate' => $data['OrderDate'],
         'OrderNumber' => $data['OrderNumber'],
         'TotalAmount' => 0
        ]);
        $order->products()->detach();
        for($i = 0; $i < count((array)$request); $i++){   
        $order->products()->attach($request[$i]['ProductId'], ['Quantity' => $request[$i]['ProductQuantity'], 'UnitPrice' => 0] );
        }

        return 'success';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::All();
        return view('/orders');
    }
}

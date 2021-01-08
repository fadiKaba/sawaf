<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;

Route::get('/', function () {
    return view('/home');
});

//Products routers
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/createproduct', [ProductsController::class, 'create']);
Route::post('/addnewproduct', [ProductsController::class, 'store'])->name('addproduct');
Route::get('/editproduct/{productid}', [ProductsController::class, 'edit']);
Route::post('/updateproduct/{productid}', [ProductsController::class, 'update'])->name('updateproduct');

//Orders routers
Route::get('/orders', [OrdersController::class, 'index']);
Route::get('/createorder', [OrdersController::class, 'create']);
Route::post('/addorder', [OrdersController::class, 'store'])->name('addorder');
Route::get('/editorder/{orderId}', [OrdersController::class, 'edit']);
Route::patch('/updateorder/{orderId}', [OrdersController::class, 'update']);

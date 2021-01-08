<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['OrderDate', 'OrderNumber', 'CustomerId', 'TotalAmount'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'CustomerId', 'id');
    }
    public function products(){
        return $this->belongsToMany(Product::class, 'order_items', 'OrderId', 'ProductId')->withPivot('Quantity', 'UnitPrice');
    }
}

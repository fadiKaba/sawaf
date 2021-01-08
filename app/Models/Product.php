<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['SupplierId', 'ProductName', 'UnitPrice'];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'SupplierId');
    }

    public function orders(){

        return $this->belongsToMany(Order::class, 'order_items', 'ProductId', 'OrderId');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['SupplierId', 'ProductName', 'UnitPrice'];
    public function supplier(){
        return $this->belongsTo(Supplier::class,'SupplierId');
    }

}

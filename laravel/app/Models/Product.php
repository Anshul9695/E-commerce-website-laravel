<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function catname(){
        return $this->belongsTo(Catagory::class,'category_id');
    }

    public function productDetails(){
        return $this->hasOne(ProductDetails::class);
    }
}

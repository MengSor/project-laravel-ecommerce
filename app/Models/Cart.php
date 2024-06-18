<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts";
    protected $primaryKey = "product_id";
    protected $fillable = [
        "user_id",
    ];
    
    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function product(){
        return $this->hasOne('App\Models\Product','pid','product_id');
    }
   
}

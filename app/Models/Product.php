<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasOne('App\Models\Category','cid','pid');
    }
    protected $table = "product";
    protected $primaryKey = "pid";
    protected $fillable = [
        "pname",
        "pdesc",
        "enable",
        "pprice",
        "pimg",
        "cid",
        "category",
        "quantity",
    ];
}

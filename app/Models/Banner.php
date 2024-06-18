<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = "banner";
    protected $primaryKey = 'ssid';
    protected $fillable = [
        "title",
        "subtitle",
        "text",
        "enable",
        "link",
        "img",
        "ssorder",
    ];
}

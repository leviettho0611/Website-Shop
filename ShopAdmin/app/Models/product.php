<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table='product';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'price',
        'id_category',
        'id_brand',
        'id_sale',
        'sale',
        'company',
        'image',
        'detail',
        'id_user',
        
        
    ];
}

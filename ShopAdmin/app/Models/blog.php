<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $table='blog';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'image',
        'description',
        'content',
        
    ];
}

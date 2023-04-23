<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    use HasFactory;
    protected $table='rate';
    public $timestamps = true;
    protected $fillable = [
        'rate',
        'id_user',
        'id_blog',
        
        
    ];
}

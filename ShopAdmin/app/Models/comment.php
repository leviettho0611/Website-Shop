<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table='blogcomment';
    public $timestamps = true;
    protected $fillable = [
        'comment',
        'name',
        'id_user',
        'id_blog',
        'image',
        'level',
    ];
}

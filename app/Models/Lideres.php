<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lideres extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'apellido', 'area', 'imagen',
    ];
}
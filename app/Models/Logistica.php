<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistica extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'apellido', 'area', 'imagen',
    ];
}

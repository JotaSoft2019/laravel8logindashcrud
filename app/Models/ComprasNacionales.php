<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprasNacionales extends Model
{
    use HasFactory;
    protected $fillable = [
        'area', 'imagen', 'lema',
    ];
}

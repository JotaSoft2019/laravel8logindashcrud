<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comex extends Model
{
    use HasFactory;
    protected $fillable = [
        'area', 'imagen', 'lema',
    ];
}
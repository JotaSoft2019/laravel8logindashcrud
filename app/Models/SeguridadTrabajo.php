<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguridadTrabajo extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'imagen', 'pdf_path', 'parrafo'];
}
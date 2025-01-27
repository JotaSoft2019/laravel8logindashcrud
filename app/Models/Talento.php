<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talento extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'pdf_path', 'text'];
}
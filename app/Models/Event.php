<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }
    protected $fillable = [
        'titulo','descripcion','fecha_inicio','fecha_fin',
    ];
}

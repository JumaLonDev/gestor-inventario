<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'sku',
        'cantidad',
        'precio',
    ];

    protected $casts = [
        'cantidad' => 'integer',
        'precio' => 'float',
    ];
}

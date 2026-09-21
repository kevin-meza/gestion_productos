<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImagen extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'ruta_storage',
        'orden'
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

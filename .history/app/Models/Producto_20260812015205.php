<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\ProductoImagen;
use Override;

class Producto extends Model
{
    // public function fillable(array $fillable)
    // {
    //     return parent::fillable($fillable);
    // }
    use HasFactory;
      protected $table = 'productos';
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function imagenes()
    {
    return $this->hasMany(ProductoImagen::class);
    }
}

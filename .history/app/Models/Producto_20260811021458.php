<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

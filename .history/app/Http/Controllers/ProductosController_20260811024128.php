<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
class ProductosController extends Controller
{
    //
     public function index()
    {
        //
        Log::info('llega al index productos');
        return view('productos.index');
    }
    public function create(){

        $marcas = Marca::where('activo',1)->orderBy('nombre')->get();
        $categorias = Categoria::where('activo',1)->orderBy('nombre','asc')->get();


        return response()->json([
            'categorias' => $categorias,
            'marcas' => $marcas
        ]);
    }

    public function ListarProductos(Request $request){

        $filtros = {};
        $productos = Producto::with('marca','categoria')
            //  ->when($request->nombre, function ($query, $nombre) {
            //     $query->where('productos.nombre', 'LIKE', "%{$nombre}%");
            // })
            ->orderBy('productos.nombre','asc')->get();
        Log::info($productos);
        return response()->json([
            'productos' => $productos
        ]);

    }

}

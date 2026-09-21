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
        $nombre_filtro = $request->nombre_filtro;
        $marca_filtro = $request->marca_filtro;
        $categoria_filtro = $request->categoria_filtro;
        $codigo_filtro = $request->codigo_filtro;
        Log::info($codigo_filtro);

        $productos = Producto::with('marca','categoria')
            ->when($nombre_filtro, function ($query, $nombre_filtro) {
                $query->where('productos.nombre', 'LIKE', "%{$nombre_filtro}%");
            })
            ->when($marca_filtro, function ($query, $marca_filtro) {
                $query->where('productos.marca_id', '=', $marca_filtro);
            })
            ->when($categoria_filtro, function ($query, $categoria_filtro) {
                $query->where('productos.categoria_id', '=', $categoria_filtro);
            })
            ->orderBy('productos.nombre','asc')->get();
        Log::info($productos);
        return response()->json([
            'productos' => $productos
        ]);

    }

}

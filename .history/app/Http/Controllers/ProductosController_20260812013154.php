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

    public function store(Request $request)
    {
        Log::info('store');
        Log::info($request);
        $producto = new Producto();



        $producto->nombre = $request->nombre;
        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->marca_id = $request->marca_id;
        $producto->categoria_id = $request->categoria_id;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->unidad_medida = $request->unidad_medida;
        $producto->activo = filter_var($request->activo, FILTER_VALIDATE_BOOLEAN);
        // $producto->info_extra = ['prueba' =>1,"ruta_img" => $ruta];

        $ruta_imagenes = '';
        if ($request->hasFile('imagen')) {

            $ruta = $request->file('imagen')->store('productos', 'public');
            log::info('trae imagen');
        }
        $producto->save();

        // return redirect()->back()->with('success', 'Persona creada correctamente.');
    }

    public function ListarProductos(Request $request){
        $nombre_filtro = trim($request->filled('nombre_filtro')) ? trim($request->input('nombre_filtro')) : null;
        $marca_filtro = $request->marca_filtro;
        $categoria_filtro = $request->categoria_filtro;
        $codigo_filtro = $request->codigo_filtro;

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
             ->when($codigo_filtro, function ($query, $codigo_filtro) {
                 $query->where('productos.codigo', 'LIKE', "%{$codigo_filtro}%");
            })
            ->orderBy('productos.nombre','asc')->get();
        Log::info($productos);
        return response()->json([
            'productos' => $productos
        ]);

    }

}

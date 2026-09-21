<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Categoria;
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

    }

}

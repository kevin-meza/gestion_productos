<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //
     public function index()
    {
        //
        Log::info('llega al index');
        return view('personas.index');
    }

}

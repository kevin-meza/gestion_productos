<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Log::info('llega al index');
        return view('personas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::info('llega al create');
        return view('personas.registrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('store');
        Log::info($request);
        $persona = new Persona();

        $ruta = '';
        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('personas', 'public');
        }

        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->rut = $request->rut;
        $persona->info_extra = ['prueba' =>1,"ruta_img" => $ruta];
        $persona->save();

        // return redirect()->back()->with('success', 'Persona creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Log::info('llega al update');
        Log::info($request->all());
        // dd($request->all(), $request->method(), $id);
        Log::info($id);

        try {
            $persona = Persona::find($id);

            $persona->nombre = $request->persona;
            $persona->apellido = $request->apellido;
            $persona->rut = $request->rut;

            if ($persona->isDirty()) {

                $persona->save();
                return response()->json([
                    'mensaje' => 'Se actualizó correctamente'
                ]);
            }

            return response()->json([
                'mensaje' => 'No hubo cambios'
            ]);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Log::info('llega al destroy');
        try {
            Persona::where('id', $id)
                ->update([
                    'activo' => 0
                ]);

            return response()->json([
               'Usuario Desactivado'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function listarPersonas(){
         Log::info('llega al listaPersonas');
        $listaPersonas = Persona::where('activo',1)->get();

        return response()->json([
            'personas' => $listaPersonas
        ]);
    }
}

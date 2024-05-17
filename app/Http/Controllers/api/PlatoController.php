<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Plato;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platos = DB::table('platos')
        ->join('menus', 'platos.menu_id', '=' , 'menus.id')
        ->select('platos.*', "menus.nombre")
        ->get();
              
        return json_encode(['platos' => $platos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plato = new Plato ();
        $plato->menu_id = $request->menu_id;
        $plato->nombre= $request->nombre;
        $plato->descripcion= $request->descripcion;  
        $plato->precio= $request->precio;                

        $plato->save();        
    
        return json_encode(['plato' => $plato   ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plato = Plato::find($id);
        return json_encode(['plato' => $plato]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plato = Plato::find($id);
        $plato->menu_id = $request->menu_id;
        $plato->nombre= $request->nombre;
        $plato->descripcion= $request->descripcion;  
        $plato->precio= $request->precio;                
        return json_encode(['plato' => $plato]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plato = Plato::find($id);
        $plato->delete();
        $platos = DB::table('platos')
        ->join('menus', 'platos.menu_id', '=' , 'menus.id')
        ->select('platos.*', "menus.nombre")
        ->get();
              
        return json_encode(['platos' => $platos, 'success' => true]);
    }
}

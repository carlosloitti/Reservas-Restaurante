<?php

namespace App\Http\Controllers\api;

use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesa = DB::table('mesas') 
        ->select('mesas.*')
        ->get();
    
        return json_encode(['mesas' => $mesa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mesa = new Mesa ();
        $mesa->numero_mesa = $request->numero_mesa;
        $mesa->capacidad= $request->capacidad;
        $mesa->ubicacion= $request->ubicacion;  

        $mesa->save();        
    
        return json_encode(['mesa' => $mesa]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mesa = Mesa::find($id);

        return json_encode(['mesa'  => $mesa ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mesa = Mesa::find($id);
        $mesa->numero_mesa = $request->numero_mesa;
        $mesa->capacidad= $request->capacidad;
        $mesa->ubicacion= $request->ubicacion;  
    
    
        return json_encode(['mesa' => $mesa]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mesa = Mesa::find($id);
        $mesa->delete();
        $mesa = DB::table('mesas') 
        ->select('mesas.*')
        ->get();
    
        return json_encode(['mesas' => $mesa]);
    }
}

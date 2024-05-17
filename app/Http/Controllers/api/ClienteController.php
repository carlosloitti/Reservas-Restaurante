<?php

namespace App\Http\Controllers\api;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = DB::table('clientes') 
        ->select('clientes.*')
        ->get();
    
        return json_encode(['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new Cliente ();
        $cliente->nombre = $request->nombre;
        $cliente->apellido= $request->apellido;
        $cliente->telefono  = $request->telefono; 
        $cliente->email = $request->email; 

        $cliente->save();        
    
        return json_encode(['cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);

        return json_encode(['cliente'  => $cliente ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);
        $cliente->nombre = $request->nombre;
        $cliente->apellido= $request->apellido;
        $cliente->telefono  = $request->telefono; 
        $cliente->email = $request->email; 
        $cliente->save();        
    
        return json_encode(['cliente' => $cliente]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        $clientes = DB::table('clientes') 
        ->select('clientes.*')
        ->get();
    
        return json_encode(['clientes' => $clientes, 'success' => true]);

    }
}

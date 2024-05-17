<?php

namespace App\Http\Controllers\api;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = DB::table('reservas')
        ->join('clientes', 'reservas.cliente_id', '=' , 'clientes.id')
        ->join('mesas', 'reservas.mesa_id', '=' , 'mesas.id')
        ->select('reservas.*', "clientes.nombre" , "mesas.ubicacion")
        ->get();
              
        return json_encode(['reservas' => $reservas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reserva = new Reserva ();
        $reserva->cliente_id = $request->cliente_id;
        $reserva->mesa_id= $request->mesa_id;
        $reserva->fecha_reserva= $request->fecha_reserva;  
        $reserva->duracion= $request->duracion; 
        $reserva->estado= $request->estado;                

        $reserva->save();        
    
        return json_encode(['reserva' => $reserva]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reserva = Reserva::find($id);
        return json_encode(['reserva' => $reserva]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reserva = Reserva::find($id);
        $reserva->cliente_id = $request->cliente_id;
        $reserva->mesa_id= $request->mesa_id;
        $reserva->fecha_reserva= $request->fecha_reserva;  
        $reserva->duracion= $request->duracion; 
        $reserva->estado= $request->estado;                

        return json_encode(['reserva' => $reserva]);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();
        $reservas = DB::table('reservas')
        ->join('clientes', 'reservas.cliente_id', '=' , 'clientes.id')
        ->join('mesas', 'reservas.mesa_id', '=' , 'mesas.id')
        ->select('reservas.*', "clientes.nombre" , "mesas.ubicacion")
        ->get();
              
        return json_encode(['reservas' => $reservas, 'success' => true]);
    }
}

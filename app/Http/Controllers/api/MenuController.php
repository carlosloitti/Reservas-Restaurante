<?php

namespace App\Http\Controllers\api;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = DB::table('menus') 
        ->select('menus.*')
        ->get();
    
        return json_encode(['menus' => $menu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = new Menu ();
        $menu->nombre = $request->nombre;
        $menu->descripcion= $request->apellido; 

        $menu->save();        
    
        return json_encode(['menu' => $menu]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::find($id);

        return json_encode(['menu'  => $menu ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id); 
        $menu->nombre = $request->nombre;
        $menu->descripcion= $request->apellido;      
    
        return json_encode(['menu' => $menu]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        $menu = DB::table('menus') 
        ->select('menus.*')
        ->get();
    
        return json_encode(['menus' => $menu, 'success' => true]);
    }
}

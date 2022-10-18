<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoProducto=TipoProducto::included()
                            ->filter()
                            ->sort()
                            ->get();
      return  $tipoProducto;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipoProducto' => 'required|max:255',
            
        ]);
        $tipoProducto=TipoProducto::create($request->all());
        return  $tipoProducto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $category = Category::with(['posts'])->findOrFail($id);
       $tipoProducto = TipoProducto::included()->findOrFail($id);
       //$category = Category::included(); para probar los returns
        return  $tipoProducto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoProducto  $tipoProducto)
    {
        $request->validate([
            'tipoProducto' => 'required|max:255',   
        ]);
        $tipoProducto->update($request->all());
        return  $tipoProducto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoProducto  $tipoProducto)
    {
        $tipoProducto->delete();
        return  $tipoProducto;
    }
}
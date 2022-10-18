<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fundaciones;
use Illuminate\Http\Request;

class FundacionesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fundacion=Fundaciones::included()
                            ->filter()
                            ->sort()
                            ->get();
      return $fundacion;
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
            'nombre' => 'required|max:255',
            'direccion'=> 'required|max:255',
             'telefono'=> 'required|max:255', 
             'servicio_id'=> 'required|max:255',  
        ]);
        $fundacion=Fundaciones::create($request->all());
        return $fundacion;
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
       $fundacion = Fundaciones::included()->findOrFail($id);
       //$category = Category::included(); para probar los returns
        return $fundacion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fundaciones $fundacion)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion'=> 'required|max:255',
             'telefono'=> 'required|max:255', 
             'servicio_id'=> 'required|max:255',  
        ]);
        $fundacion->update($request->all());
        return $fundacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fundaciones $fundacion)
    {
        $fundacion->delete();
        return $fundacion;
    }
}

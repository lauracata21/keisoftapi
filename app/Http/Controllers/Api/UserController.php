<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::included()
                            ->filter()
                            ->sort()
                            ->get();
      return  $user;
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
            'nombre'=> 'required|max:255',
            'apellido'=> 'required|max:255',
            'email'=> 'required|max:255',
            'password'=> 'required|max:255',
            'direccion'=> 'required|max:255',
            
        ]);
        $user=User::create($request->all());
        return  $user;
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
       $user = User::included()->findOrFail($id);
       //$category = Category::included(); para probar los returns
        return  $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User  $user)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion'=> 'required|max:255',
             'telefono'=> 'required|max:255', 
             'servicio_id'=> 'required|max:255',  
        ]);
        $user->update($request->all());
        return  $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return  $user;
    }
}

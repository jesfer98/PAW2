<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contenido;

class ContController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('producto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
$this->validate( $request, [
    'nombre'=>'required',

    'descripcion'=>'nullable',
    'categoria'=>['required','numeric'],
    'usuario'=>'nullable',
    'val_pos'=>'nullable',
    'val_neg'=>'nullable',
    'estado'=>'nullable'
]);
   $contenido = new Contenido([
    'nombre'=> $request->get('nombre'),
    
    'descripcion'=>$request->get('descripcion'),
    'categoria'=>$request->get('categoria'),
    'usuario'=>$request->get('custId'),
    'val_pos'=>$request->get('val_pos'),
    'val_neg'=>$request->get('val_neg'),
    'estado'=>$request->get('estado'),
    
   ]);

   $contenido->save();

   return redirect()->route('prd')->with('success',
   'data acept');



          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Itinerario;
use App\Models\Pasajero;
use Illuminate\Http\Request;

class PasajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasajeros = Pasajero::orderBy('id','asc')->paginate(10);
        return view('pasajero.index',compact('pasajeros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasajero.create');
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

            'nombre'=>'required',
            'apellido'=>'required',
            'ci'=>'required',
            'genero'=>'required',
            'telefono'=>'required',
            'direccion'=>'required',
        ]);
        Pasajero::create($request->all());
        return redirect()->route('pasajero.index');
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
    public function edit(Pasajero $pasajero)
    {
        return view('pasajero.edit',compact('pasajero'));
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
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'ci'=>'required',
            'genero'=>'required',
            'telefono'=>'required',
            'direccion'=>'required',
        ]);
        $pasajero = Pasajero::findOrFail($id);
        $datos = $request->all();
        $pasajero->update($datos);
        return redirect()->route('pasajero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$delete = Itinerario::find($id);
        $delete->delete();*/
        return back()->with('mensaje', 'Este Dato no puede ser eliminado solo puede ser editado');
    }
}

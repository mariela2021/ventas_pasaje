<?php

namespace App\Http\Controllers;

use App\Models\Encomienda;
use Illuminate\Http\Request;

class EncomiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encomiendas = Encomienda::orderBy('id','asc')->paginate(10);
        return view('encomienda.index',compact('encomiendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encomienda.create');
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
            'telefono_remitente'=>'required',
            'ci'=>'required',
            'destinatario'=>'required',
            'telefono_destinatario'=>'required',
            'contenido'=>'required',
            'valor'=>'required',
            'fecha_recepcion'=>'required',
            'estado'=>'required'
        ]);
        Encomienda::create($request->all());
        return redirect()->route('encomienda.index');
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
    public function edit(Encomienda $encomienda)
    {
        return view('encomienda.edit',compact('encomienda'));
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
            'telefono_remitente'=>'required',
            'ci'=>'required',
            'destinatario'=>'required',
            'telefono_destinatario'=>'required',
            'contenido'=>'required',
            'valor'=>'required',
            'fecha_recepcion'=>'required',
            'estado'
        ]);
        $encomienda = Encomienda::findOrFail($id);
        $datos = $request->all();
        $encomienda->update($datos);
        return redirect()->route('encomienda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$delete = Encomienda::find($id);
        $delete->delete();*/
        return back()->with('mensaje', 'Eliminado Correctamente');
    }
}

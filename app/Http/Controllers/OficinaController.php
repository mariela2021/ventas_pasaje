<?php

namespace App\Http\Controllers;



use App\Models\Oficina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$oficinas = Oficina::orderBy('id','asc')->paginate(10);
        return view('oficina.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oficina.create');
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
            'direccion'=>'required',
            'telefono'=>'required',
            'horario'=>'required' 
        ]);
        Oficina::create($request->all());
        return redirect()->route('oficina.index');

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
    public function edit(Oficina $oficina)
    {
        return view('oficina.edit',compact('oficina'));
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
            'direccion'=>'required',
            'telefono'=>'required',
            'horario'=>'required'
        ]);
        $oficina = Oficina::findOrFail($id);
        $datos = $request->all();
        $oficina->update($datos);
        return redirect()->route('oficina.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {/*
        $delete = Oficina::find($id);
        $delete->delete();*/
        return back()->with('mensaje', 'Este Dato no puede ser eliminado solo puede ser editado');
    }
}

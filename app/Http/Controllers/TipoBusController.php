<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Tipo_Bus;
use Illuminate\Http\Request;

class TipoBusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$buses = Tipo_Bus::orderBy('id','asc')->paginate(10);
        return view('tipo_bus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_bus.create');
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
            'descripcion'=>'required'
        ]);
        Tipo_Bus::create($request->all());
        return redirect()->route('tipo_bus.index');

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
    public function edit(Tipo_Bus $bus)
    {
        return view('tipo_bus.edit',compact('bus'));
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
            'nombre' => 'required',
            'descripcion'=>'required'
        ]);
        $buses = Tipo_Bus::findOrFail($id);
        $datos = $request->all();
        $buses->update($datos);
        return redirect()->route('tipo_bus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return back()->with('mensaje', 'Este Dato no se puede Eliminar7');
    }
}

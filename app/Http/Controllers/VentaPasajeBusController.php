<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Venta_Pasaje_Bus;
use App\Models\Venta_Pasaje;

use Illuminate\Http\Request;

class VentaPasajeBusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venta_pasaje_bus = Venta_Pasaje_Bus::all();
        return view('venta_pasaje_bus.index',compact('venta_pasaje_bus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $buses = Bus::all();
        $venta_pasajes = Venta_Pasaje::all();
        //$prueba = Venta_Pasaje::join('pasajero','pasajero.id','=')
        //return $venta_pasajes;
        return view('venta_pasaje_bus.create',compact('buses','venta_pasajes'));
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
            'id_bus'=>'required',
            'id_venta_pasaje'=>'required',
            'asiento'=>'required',
            'estado'=>'required'
        ]);
        Venta_Pasaje_Bus::create($request->all());
        return redirect()->route('venta_pasaje_bus.index');
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
    public function edit(Venta_Pasaje_Bus $venta_pasaje_bus)
    {
        $buses = Bus::all();
        $venta_pasajes = Venta_Pasaje::all();
        return view('venta_pasaje_bus.edit',compact('venta_pasaje','buses','venta_pasajes'));
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
            'id_bus'=>'required',
            'id_venta_pasaje'=>'required',
            'asiento'=>'required',
            'estado'=>'required'
        ]);
        $personal = Venta_Pasaje_Bus::findOrFail($id);
        $datos = $request->all();
        $personal->update($datos);
        return redirect()->route('Venta_Pasaje_Bus.index');
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

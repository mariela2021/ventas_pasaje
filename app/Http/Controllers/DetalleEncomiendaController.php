<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Detalle_Encomienda;
use App\Models\Encomienda;
use App\Models\Oficina;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DetalleEncomiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$detalles = Detalle_Encomienda::join('bus_personal','bus_personal.id_bus','=','detalle_encomienda.id_bus')->join('bus','bus.id','=','detalle_encomienda.id_bus')->join('encomienda','encomienda.id','=','detalle_encomienda.id_encomienda')->join('oficina','oficina.id','=','detalle_encomienda.id_oficina')->join('personal_oficina','personal_oficina.id_oficina','=','detalle_encomienda.id_oficina')->select('bus_personal.*','encomienda.*','bus.*','oficina.*','personal_oficina.*')->where('detalle_encomienda.id_encomienda','encomienda.id')->get();*/
        $detalles = Detalle_Encomienda::orderBy('id','asc')->paginate(10);
        //return $detalles;
        return view('detalle_encomienda.index',compact('detalles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::all();
        $encomienda = Encomienda::all();
        $oficina = Oficina::all();
        return view('detalle_encomienda.create',compact('buses','encomienda','oficina'));
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
            'id_encomienda'=>'required',
            'id_oficina'=>'required'
        ]);
        Detalle_Encomienda::create($request->all());
        return redirect()->route('detalle_encomienda.index');
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
    public function edit(Detalle_Encomienda $detalle)
    {
        $buses = Bus::all();
        $encomienda = Encomienda::all();
        $oficina = Oficina::all();
        return view('detalle_encomienda.edit',compact('detalle','buses','encomienda','oficina'));
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
            'id_encomienda'=>'required',
            'id_oficina'=>'required'
        ]);
        $detalle = Detalle_Encomienda::findOrFail($id);
        $detalle->update($request->all());
        return redirect()->route('detalle_encomienda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Detalle_Encomienda::find($id);
        $delete->delete();
        return back()->with('mensaje', 'Eliminado Correctamente');
    }
}

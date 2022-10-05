<?php

namespace App\Http\Controllers;

use App\Models\Asientos;
use App\Models\Bus;
use App\Models\Tipo_Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        //$buses = DB::table('tipo_bus')->join('bus','bus.id_tipo_bus','=','tipo_bus.id')->select('bus.*','tipo_bus.*','bus.id as id')->orderBy('bus.id','asc')->paginate(10);
        //return $buses;
        return view('bus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Tipo_Bus::all();
        return view('bus.create',compact('buses'));
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
            'id_tipo_bus'=>'required',
            'marca'=>'required',
            'placa'=>'required',
            'estado'=>'required',
            'capacidad'=>'required'
        ]);
        Bus::create($request->all());
        $id = Bus::latest('id')->first()->id;
        $fin = Bus::latest('id')->first()->capacidad;
        $a = 1;
        while ($a <= $fin) {
            $asiento = new Asientos();
            $asiento->IdBus = $id;
            $asiento->NumeroAsiento = $a;
            $asiento->Estado = 'Libre';
            $asiento->save();
            $a++;
        }
        return redirect()->route('bus.index');
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
    public function edit(Bus $bus)
    {
        $buses = Tipo_Bus::all();
        return view('bus.edit',compact('bus','buses'));
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
            'id_tipo_bus' => 'required',
            'marca'=>'required',
            'placa'=>'required',
            'estado'=>'required',
            'capacidad'=>'required'
        ]);
        $buses = Bus::findOrFail($id);
        $datos = $request->all();
        $buses->update($datos);
        return redirect()->route('bus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$delete = Bus::find($id);
        $delete->delete();*/
        return back()->with('mensaje', 'Eliminado Correctamente');
    }
}

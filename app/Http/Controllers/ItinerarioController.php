<?php

namespace App\Http\Controllers;

use App\Models\Asientos;
use App\Models\Bus;
use App\Models\Itinerario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItinerarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itinerario = Itinerario::orderBy('id','asc')->paginate(10);
        //return $itinerario;
        return view('itinerario.index',compact('itinerario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::all();
        return view('itinerario.create',compact('buses'));
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
            'nombre_itinerario'=>'required',
            'origen'=>'required',
            'destino'=>'required',
            'dia'=>'required',
            'precio'=>'required',
            'hora_salida'=>'required',
            'hora_llegada'=>'required'
        ]);
        Itinerario::create($request->all());
        return redirect()->route('itinerario.index');
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
    public function edit(Itinerario $itinerario)
    {
        $buses = Bus::all();
        return view('itinerario.edit',compact('itinerario','buses'));
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
            'nombre_itinerario'=>'required',
            'origen'=>'required',
            'destino'=>'required',
            'dia'=>'required',
            'precio'=>'required',
            'hora_salida'=>'required',
            'hora_llegada'=>'required'
        ]);
        $itinerario = Itinerario::findOrFail($id);
        $itinerario->update($request->all());
        return redirect()->route('itinerario.index');
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

    public function libre($id){
        $bus = Itinerario::find($id);
        //$libre = Bus::find($bus->id_bus);
        
        //$asiento = DB::table('asientos')->select('id','IdBus','Estado',)->where('IdBus','=',$bus->id_bus)->orderBy('id','asc')->get();
        
        DB::table('asientos')->where('IdBus',$bus->id_bus)->where('Estado','=','Ocupado')->update(['Estado'=>'Libre']);
        /* $tabulatorsHistory = DB::table('cat_tabulator_histories')
          ->where('id_tabulator', $name)
          ->where('is_active', true)
          ->update(['is_active' => false]); */

        //return $prueba;
        return redirect()->route('itinerario.index');
    }
}

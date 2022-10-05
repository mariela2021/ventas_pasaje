<?php

namespace App\Http\Controllers;

use App\Models\Asientos;
use App\Models\Bus;
use App\Models\Itinerario;
use App\Models\Pasajero;
use App\Models\Venta_Pasaje;
use App\Models\Venta_Pasaje_Bus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class VentaPasajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$venta_pasaje = Venta_Pasaje::orderBy('id','asc')->paginate(10);
        //$venta_pasaje = DB::table('venta_pasaje')->join('pasajero','pasajero.id','=','venta_pasaje.id_pasajero')->join('itinerario','itinerario.id','=','venta_pasaje.id_itinerario')->select('pasajero.*','itinerario.*','venta_pasaje.id as id')->get();
        //return $prueba; 
        return view('venta_pasaje.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$prueba = [
            ['Monday'=>'Lunes'],
            ['Tuesday'=>'Martes'],
            ['Miercoles'=>'Wednesday'],
            ['Jueves'=>'Thursday'],
            ['Viernes'=>'Friday'],
            ['Sabado'=>'Saturday'],
            ['Domingo'=>'Sunday']
        ];*/
        $itinerarios = Itinerario::all();
        $pasajeros = Pasajero::all();
        //$placa = Bus::select('placa')->get();
        //return $placa->pluck('placa');
        //$asiento = Asientos::select('NumeroAsiento')->where('IdBus','=','8')->where('Estado','=','Libre')->get();
        //return $asiento;
        //$itinerarios = DB::table('itinerario')->select('id_bus')->get();
        //$itinerarios = Itinerario::select('id_bus')->get();
        //return $itinerarios->pluck('id_bus');
       
        //return $itinerarios->pluck('dia');
       /* $date = Carbon::now();
        $hoy = getdate();
        //return $hoy['weekday'];
        return $prueba['0'];*/
        
        /*$date = Carbon::now();
        $hoy = date("l");
        return $hoy;
        return $date->dayOfWeek;*/
        return view('venta_pasaje.create',compact('itinerarios','pasajeros'));
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
            'id_itinerario'=>'required',
            'id_pasajero'=>'required',
            'fecha'=>'required',
            'id_bus'=>'required',
            'asiento'=>'required'
        ]);
        Venta_Pasaje::create([
            'id_pasajero'=> $request['id_pasajero'],
            'id_itinerario'=>$request['id_itinerario'],
            'fecha'=>$request['fecha']
        ]);
        $id = Venta_Pasaje::latest('id')->first()->id;
        $venta_bus = new Venta_Pasaje_Bus();
        $venta_bus->id_bus = $request['id_bus'];
        $venta_bus->id_venta_pasaje = $id;
        $venta_bus->asiento = $request['asiento'];
        $venta_bus->estado = 'Ocupado';
        $venta_bus->save();
        $bus = $request->id_bus;
        $numeroAsiento = $request->asiento;
        $datos = DB::table('asientos')->where('NumeroAsiento','=',$numeroAsiento)->where('IdBus','=',$bus)->first();
        $asiento = Asientos::find($datos->id);
        $asiento->Estado = 'Ocupado';
        $asiento->update();

        return redirect()->route('venta_pasaje.index');
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
    public function edit(Venta_Pasaje $venta_pasaje)
    {
        $itinerarios = Itinerario::all();
        $pasajeros = Pasajero::all();
        return view('venta_pasaje.edit',compact('venta_pasaje','itinerarios','pasajeros'));
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
        $venta = Venta_Pasaje::find($id);
        $pasaje = Venta_Pasaje_Bus::find($venta->id);
        $request->validate([
            'id_itinerario'=>'required',
            'id_pasajero'=>'required',
            'fecha'=>'required',
            'id_bus'=>'required',
            'asiento'=>'required'
        ]);
        //cambiando el estado del asiento actual a Libre 
        $datos = DB::table('asientos')->where('NumeroAsiento','=',$pasaje->asiento)->where('IdBus','=',$pasaje->id_bus)->first();
        $asiento = Asientos::find($datos->id);
        $asiento->Estado = 'Libre';
        $asiento->update();
        //fin
        //actualizando los datos de venta pasaje y venta pasaje bus
        $venta->id_pasajero = $request['id_pasajero'];
        $venta->id_itinerario = $request['id_itinerario'];
        $venta->fecha = $request['fecha'];
        $venta->save();
        $pasaje->id_bus = $request['id_bus'];
        $pasaje->id_venta_pasaje = $id;
        $pasaje->asiento = $request['asiento'];
        $pasaje->estado = 'Ocupado';
        $pasaje->save();
        //actualizando el estado del nuevo asiento a ocupado
        $nuevodato = DB::table('asientos')->where('NumeroAsiento','=',$request['asiento'])->where('IdBus','=',$request['id_bus'])->first();
        $nuevoAsiento = Asientos::find($nuevodato->id);
        $nuevoAsiento->Estado = 'Ocupado';
        $nuevoAsiento->update();

        return redirect()->route('venta_pasaje.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Venta_Pasaje::find($id);
        $delete->delete();
        return back()->with('mensaje', 'Eliminado Correctamente');
        
    }

    public function itinerario(Request $request){
        $date = $request->texto;
        $date = Carbon::parse($date)->format('l');
        switch($date){
            case 'Monday': $date = "Lunes";
            break;
            case 'Tuesday': $date = "Martes";
            break;
            case 'Wednesday': $date = "Miercoles";
            break;
            case 'Thursday': $date = "Jueves";
            break;
            case 'Friday': $date = "Viernes";
            break;
            case 'Saturday': $date = "Sabado";
            break;
            case 'Sunday': $date = "Domingo";
            break;
        }
        if(isset($date)){
            $itinerario = Itinerario::where('dia',$date)->get();
            return response()->json(
                [
                    'lista' => $itinerario,
                    'success'=> true
                ]
                );
        }else {
            return response()->json(
                [
                    'success'=> false
                ]
                );
        }
    }

    public function bus(Request $request){        
        if(isset($request->texto)){
            $itinerario = DB::table('itinerario')->select('id_bus')->where('id',$request->texto)->get();
            $bus = DB::table('bus')->select('id','placa')->where('id',$itinerario->pluck('id_bus'))->get();
            return response()->json(
                [
                    'lista' => $bus,
                    'success'=> true
                ]
                );
        }else {
            return response()->json(
                [
                    'success'=> false
                ]
                );
        }
    }

    public function asiento(Request $request){
        if(isset($request->texto)){
            $asiento = Asientos::select('id','NumeroAsiento')->where('IdBus','=',$request->texto)->where('Estado','=','Libre')->orderBy('id','asc')->get();
            return response()->json(
                [
                    'lista' => $asiento,
                    'success'=> true
                ]
                );
        }else {
            return response()->json(
                [
                    'success'=> false
                ]
                );
        }
    }

    
}

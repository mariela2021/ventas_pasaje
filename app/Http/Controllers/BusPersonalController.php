<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Bus_Personal;
use App\Models\Roles;
use Illuminate\Http\Request;

class BusPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$personal = Bus_Personal::orderBy('id','asc')->paginate(10);
        return view('bus_personal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        $buses = Bus::all();
        return view('bus_personal.create',compact('roles','buses'));
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
            'licencia'=>'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'id_rol'=>'required',
            'id_bus'=>'required',
        ]);
        Bus_Personal::create($request->all());
        return redirect()->route('bus_personal.index');
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
    public function edit(Bus_Personal $bus_personal)
    {
        $roles = Roles::all();
        $buses = Bus::all();
        return view('bus_personal.edit',compact('bus_personal','roles','buses'));
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
            'licencia'=>'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'id_rol'=>'required',
            'id_bus'=>'required'
        ]);
        $personal = Bus_Personal::findOrFail($id);
        $datos = $request->all();
        $personal->update($datos);
        return redirect()->route('bus_personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Bus_Personal::find($id);
        $delete->delete();
        return back()->with('mensaje', 'Eliminado Correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use App\Models\Personal_Oficina;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonalOficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$personal = DB::table('users')->join('personal_oficina','personal_oficina.user_id','=','users.id')->join('oficina','oficina.id','=','personal_oficina.id_oficina')->join('roles','roles.id','=','users.role_id')->select('personal_oficina.*','personal_oficina.id as id','roles.nombre as rol','oficina.nombre as ofi')->where('personal_oficina.estado','=','Activo')->paginate(10);
       
        return view('personal_oficina.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$id = auth();
        //return $id;
        $roles = Roles::all();
        $oficinas = Oficina::all();
        return view('personal_oficina.create',compact('roles','oficinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $id = User::latest('id')->first()->id;
        //return $request->id_rol;
        $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'id_rol'=>'required',
            'estado'=>'required',
            'fecha_ingreso'=>'required',
            'id_oficina'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $pass = Hash::make($request['password']);
        /*User::create([
            'name'=>$request->apellido,
            'email'=> $request->email,
            'email_verified_at' => now(),
            'password'=> $pass,
            'role_id'=> $request['id_rol'],
            'created_at' => now(),
            'updated_at' => now()
        ]);*/
        $users = new User();
        $users->name = $request['apellido'];
        $users->email = $request['email'];
        $users->password = $pass;
        $users->role_id = $request['id_rol'];
        $users->save(); 

        $id = User::latest('id')->first()->id;
        $users = new Personal_Oficina();
        $users->nombre = $request['nombre'];
        $users->apellido = $request['apellido'];
        $users->telefono = $request['telefono'];
        $users->direccion = $request['direccion'];
        $users->estado = $request['estado'];
        $users->fecha_ingreso= $request['fecha_ingreso'];
        $users->id_oficina = $request['id_oficina'];
        $users->user_id = $id;
        $users->save();

        /*Personal_Oficina::create([
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'id_rol'=>$request->id_rol,
            'estado'=> $request->estado,
            'fecha_ingreso'=> $request->fecha_ingreso,
            'id_oficina'=> $request->id_oficina,  
            'user_id'=> $id        
        ]);*/

        //Personal_Oficina::create($request->all());
        return redirect()->route('personal_oficina.index');
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
    public function edit(Personal_Oficina $personal_oficina)
    {
        $roles = Roles::all();
        $oficinas = Oficina::all();
        $id = $personal_oficina->user_id;
        $users = DB::table('users')->select('name','email')->where('id','=',$id)->first();
        //return $users;
        return view('personal_oficina.edit',compact('personal_oficina','roles','oficinas','users'));
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
            'id_rol'=>'required',
            'estado'=>'required',
            'fecha_ingreso'=>'required',
            'id_oficina'=>'required',
        ]);
        $personal = Personal_Oficina::findOrFail($id);
        $datos = $request->all();
        $personal->update($datos);
        return redirect()->route('personal_oficina.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Personal_Oficina::find($id);
        /*$prueba = DB::table('personal_oficina')->where('id',$user->id)->where('estado','=','Activo')->get();*/
        $usuario = User::find($user->user_id);
        $usuario->delete();
        //return $user;
        //$delete->delete(); ->update(['estado'=>'Inactivo'])
        return back()->with('mensaje', 'Eliminado Correctamente');
    }
}

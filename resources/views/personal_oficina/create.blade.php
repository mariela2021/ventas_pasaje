@extends('layouts.app', ['activePage' => 'personal_oficina', 'titlePage' => __('Crear Personal de Oficina')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('personal_oficina.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Nombre:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="nombre"
                                value="{{ old('nombre') }}" autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('nombre') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Apellido:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="apellido"
                                value="{{ old('apellido') }}" autofocus>
                                @if ($errors->has('apellido'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('apellido') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Telefono:</b> </label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control"
                                name="telefono"
                                value="{{ old('telefono') }}" autofocus>
                                @if ($errors->has('telefono'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('telefono') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Direccion:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="direccion"
                                value="{{ old('direccion') }}" autofocus>
                                @if ($errors->has('direccion'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('direccion') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Rol:</b></label>
                            <div class="col-sm-7">
                                <select name="id_rol" id="_id_rol" class="form-control"
                                value = "{{old('id_rol')}}">
                                    <option >Seleccione el Rol</option>
                                    @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                @endforeach                                
                                @if ($errors->has('id_rol'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('id_rol') }}
                                    </span>
                                @endif
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Estado:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="estado"
                                value="{{ old('estado') }}" autofocus>
                                @if ($errors->has('estado'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('estado') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Fecha Ingreso:</b> </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control"
                                name="fecha_ingreso"
                                value="{{ old('fecha_ingreso') }}" autofocus>
                                @if ($errors->has('fecha_ingreso'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('fecha_ingreso') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Oficina:</b></label>
                            <div class="col-sm-7">
                                <select name="id_oficina" id="_id_oficina" class="form-control">
                                    <option disabled selected>Seleccione la Oficina</option>
                                    @foreach ($oficinas as $oficina)
                                    <option value="{{$oficina->id}}">{{$oficina->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Correo:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="email"
                                value="{{ old('email') }}" autofocus>
                                @if ($errors->has('email'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Contraseña:</b> </label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control"
                                name="password"
                                value="{{ old('password') }}" autofocus>
                                @if ($errors->has('password'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"class="btn btn-primary">
                            <b>Guardar Datos</b>                                 
                        </button>
                        <a href="{{route('personal_oficina.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
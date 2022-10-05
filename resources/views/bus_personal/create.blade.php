@extends('layouts.app', ['activePage' => 'bus_personal', 'titlePage' => __('Crear Personal de Bus')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('bus_personal.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Apellidos:</b> </label>
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
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Licencia:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="licencia"
                                value="{{ old('licencia') }}" autofocus>
                                @if ($errors->has('licencia'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('licencia') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Telefono:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
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
                                <select name="id_rol" id="id_rol" class="form-control">
                                    <option disabled selected>Seleccione el Rol</option>
                                    @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Bus:</b></label>
                            <div class="col-sm-7">
                                <select name="id_bus" id="_id_bus" class="form-control">
                                    <option disabled selected>Seleccione el Bus</option>
                                    @foreach ($buses as $bus)
                                    <option value="{{$bus->id}}">{{$bus->placa}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"class="btn btn-primary">
                            <b>Guardar Datos</b>                                 
                        </button>
                        <a href="{{route('bus_personal.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
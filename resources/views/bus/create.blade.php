@extends('layouts.app', ['activePage' => 'bus', 'titlePage' => __('Crear Bus')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('bus.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Tipo de Bus:</b></label>
                            <div class="col-sm-7">
                                <select name="id_tipo_bus" id="_id_tipo_bus" class="form-control"
                                >
                                    <option disabled selected>Seleccione el Bus</option>
                                    @foreach ($buses as $bus)
                                    <option value="{{$bus->id}}">{{$bus->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Marca:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="marca"
                                value="{{ old('marca') }}" autofocus>
                                @if ($errors->has('marca'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('marca') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Placa:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="placa"
                                value="{{ old('placa') }}" autofocus>
                                @if ($errors->has('placa'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('placa') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Estado:</b></label>
                            <div class="col-sm-7">
                                <select name="estado" id="_estado" class="form-control">
                                    <option disabled selected>Seleccione el Estado</option>
                                    <option value ="Funcionando">Funcionando</option>
                                    <option value ="En el Taller">En el Taller</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Capacidad:</b> </label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control"
                                name="capacidad"
                                value="{{ old('capacidad') }}" autofocus>
                                @if ($errors->has('capacidad'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('capacidad') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"class="btn btn-primary">
                            <b>Guardar Datos</b>                                 
                        </button>
                        <a href="{{route('bus.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
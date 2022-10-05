@extends('layouts.app', ['activePage' => 'encomienda', 'titlePage' => __('Crear Encomienda')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('encomienda.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Telefono Remitente:</b> </label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control"
                                name="telefono_remitente"
                                value="{{ old('telefono_remitente') }}" autofocus>
                                @if ($errors->has('telefono_remitente'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('telefono_remitente') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> CI:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="ci"
                                value="{{ old('ci') }}" autofocus>
                                @if ($errors->has('ci'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('ci') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Destinatario:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="destinatario"
                                value="{{ old('destinatario') }}" autofocus>
                                @if ($errors->has('destinatario'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('destinatario') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Telefono Destinatario:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="telefono_destinatario"
                                value="{{ old('telefono_destinatario') }}" autofocus>
                                @if ($errors->has('telefono_destinatario'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('telefono_destinatario') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Contenido:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="contenido"
                                value="{{ old('contenido') }}" autofocus>
                                @if ($errors->has('contenido'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('contenido') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Valor:</b> </label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control"
                                name="valor"
                                value="{{ old('valor') }}" autofocus>
                                @if ($errors->has('valor'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('valor') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Fecha Recepcion:</b> </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control"
                                name="fecha_recepcion"
                                value="{{ old('fecha_recepcion') }}" autofocus>
                                @if ($errors->has('fecha_recepcion'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('fecha_recepcion') }}
                                    </span>
                                @endif
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
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"class="btn btn-primary">
                            <b>Guardar Datos</b>                                 
                        </button>
                        <a href="{{route('encomienda.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
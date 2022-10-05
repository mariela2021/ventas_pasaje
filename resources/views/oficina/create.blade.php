@extends('layouts.app', ['activePage' => 'oficina', 'titlePage' => __('Crear Oficina')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('oficina.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Horario:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="horario"
                                value="{{ old('horario') }}" autofocus>
                                @if ($errors->has('horario'))
                                    <span class="error text-danger" for="input-nombre">
                                         {{ $errors->first('horario') }}
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
                        <a href="{{route('oficina.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
@extends('layouts.app', ['activePage' => 'tipo_bus', 'titlePage' => __('Crear Tipo de Bus')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('tipo_bus.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Descripcion:</b> </label>
                            <div class="col-sm-7">
                                <textarea class="form-control"
                                name="descripcion"
                                value="{{ old('descripcion') }}" autofocus cols="60" rows="3" placeholder="Descripcion..."></textarea>                                
                                 @if ($errors->has('descripcion'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('descripcion') }}
                                    </span>
                                 @endif
                            </div>                                
                        </div>
                        
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"class="btn btn-primary">
                            <b>Guardar Datos</b>                                 
                        </button>
                        <a href="{{route('tipo_bus.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
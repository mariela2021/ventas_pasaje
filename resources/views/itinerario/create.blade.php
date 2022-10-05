@extends('layouts.app', ['activePage' => 'itinerario', 'titlePage' => __('Crear Itinerario')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('itinerario.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Bus:</b></label>
                            <div class="col-sm-7">
                                <select name="id_bus" id="id_bus" class="form-control">
                                    <option disabled selected>Seleccione el Bus</option>
                                    @foreach ($buses as $bus)
                                    <option value="{{$bus->id}}">{{$bus->placa}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Nombre Itineario:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="nombre_itinerario"
                                value="{{ old('nombre_itinerario') }}" autofocus>
                                @if ($errors->has('nombre_itinerario'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('nombre_itinerario') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Origen:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="origen"
                                value="{{ old('origen') }}" autofocus>
                                @if ($errors->has('origen'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('origen') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Destino:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="destino"
                                value="{{ old('destino') }}" autofocus>
                                @if ($errors->has('destino'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('destino') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Dia:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="dia"
                                value="{{ old('dia') }}" autofocus>
                                @if ($errors->has('dia'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('dia') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Precio:</b> </label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control"
                                name="precio"
                                value="{{ old('precio') }}" autofocus>
                                @if ($errors->has('precio'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('precio') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Hora Salido:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="hora_salida"
                                value="{{ old('hora_salida') }}" autofocus>
                                @if ($errors->has('hora_salida'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('hora_salida') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Hora Llegada:</b> </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                name="hora_llegada"
                                value="{{ old('hora_llegada') }}" autofocus>
                                @if ($errors->has('hora_llegada'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('hora_llegada') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"class="btn btn-primary">
                            <b>Guardar Datos</b>                                 
                        </button>
                        <a href="{{route('itinerario.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
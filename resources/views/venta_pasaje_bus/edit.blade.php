@extends('layouts.app', ['activePage' => 'venta_pasaje_bus', 'titlePage' => __('Crear Venta de Pasaje Bus')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('venta_pasaje_bus.update',$venta_pasaje_bus->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Venta Pasaje:</b></label>
                            <div class="col-sm-7">
                                <select name="id_oficina" id="_id_oficina" class="form-control">
                                    <option disabled selected>Seleccione el Venta Pasaje</option>
                                    @foreach ($venta_pasajes as $venta_pasaje)
                                    <option value="{{$venta_pasaje->id}}">{{$venta_pasaje->fecha}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Asiento:</b> </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control"
                                name="asiento"
                                value="{{old('asiento',$venta_pasaje_bus->asiento)}}"
                                >
                            </div>                                
                        </div>
                        <br>
                        
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Estado:</b> </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control"
                                name="estado"
                                value="{{old('estado',$venta_pasaje_bus->estado)}}"
                                >
                            </div>                                
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"class="btn btn-primary">
                            <b>Guardar Datos</b>                                 
                        </button>
                        <a href="{{route('venta_pasaje_bus.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
@extends('layouts.app', ['activePage' => 'detalle_encomienda', 'titlePage' => __('Detalle Encomienda')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('detalle_encomienda.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Encomienda:</b></label>
                            <div class="col-sm-7">
                                <select name="id_encomienda" id="_id_encomienda" class="form-control">
                                    <option disabled selected>Seleccione la Encomienda</option>
                                    @foreach ($encomienda as $enco)
                                    <option value="{{$enco->id}}">{{$enco->nombre }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Oficina:</b></label>
                            <div class="col-sm-7">
                                <select name="id_oficina" id="_id_oficina" class="form-control">
                                    <option disabled selected>Seleccione la Oficina</option>
                                    @foreach ($oficina as $ofi)
                                    <option value="{{$ofi->id}}">{{$ofi->nombre}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"class="btn btn-primary">
                            <b>Guardar Datos</b>                                 
                        </button>
                        <a href="{{route('detalle_encomienda.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
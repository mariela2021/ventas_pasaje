@extends('layouts.app', ['activePage' => 'venta_pasaje_bus', 'titlePage' => __('Venta Pasaje Bus')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-left">
                <a href="{{route('venta_pasaje_bus.create')}}" class="btn btn-outline-primary btn-white">
                    <b>Agregar Venta de Pasaje en el Bus</b> 
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4>Listado de Venta Pasaje del Bus</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary text-dark">
                                    <th>Id</th>
                                    <th>Bus</th>
                                    <th>Pasajero</th>
                                    <th>Asiento</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($venta_pasaje_bus as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->id_bus}}</td>
                                            <td>{{$item->id_venta_pasaje}}</td>
                                            <td>{{$item->asiento}}</td>
                                            <td>{{$item->estado}}</td> 
                                            <td class="td-actions">
                                                <a href="{{route('venta_pasaje_bus.edit',$item->id)}}" class="btn btn-primary">
                                                <span class="material-icons">edit</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
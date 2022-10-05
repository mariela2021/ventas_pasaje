@extends('layouts.app', ['activePage' => 'detalle_encomienda', 'titlePage' => __('Detalle_Encomienda')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-left">
                <a href="{{route('detalle_encomienda.create')}}" class="btn btn-outline-primary btn-white">
                    <b>Agregar Detalle Encomienda</b> 
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4>Listado de Encomiendas</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary text-dark">
                                    <th>Id</th>
                                    <th>Placa</th>
                                    <th>Remitente</th>
                                    <th>Destinatario</th>
                                    <th>Estado</th>
                                    <th>Oficina</th>
                                    <th>Contenido</th>                         
                                    <th>Opciones</th>                                      
                                </thead>
                                <tbody>
                                    @foreach ($detalles as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->Bus()->pluck('placa')->first()}}</td>
                                            <td>{{$item->Encomienda()->pluck('nombre')->first()}}</td>
                                            <td>{{$item->Encomienda()->pluck('destinatario')->first()}}</td>
                                            <td>{{$item->Encomienda()->pluck('estado')->first()}}</td>
                                            <td>{{$item->Oficina()->pluck('nombre')->first()}}</td>
                                            <td>{{$item->Encomienda()->pluck('contenido')->first()}}</td>
                                            <td class="td-actions">
                                                <a href="{{route('detalle_encomienda.edit',$item->id)}}" class="btn btn-primary">
                                                <span class="material-icons">edit</span>
                                                </a>
                                                <form action="{{route('detalle_encomienda.delete',$item->id)}}" method="post"
                                                    style="display: inline-block;"
                                                    onsubmit="return confirm('Esta Seguro?')">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button class="btn btn-danger" type="submit">
                                                      <i class="material-icons">close</i>
                                                  </button>
                                              </form>
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
<div class="content">
    <div class="container-fluid">
        <div class="form-row">
            <div class="col">
                <div class="form-group label-floating has-success">
                    <input type="text" class="form-control" placeholder="Buscar...." wire:model.lazy="attribute">
                    <span class="form-control-feedback">
                        <i class="material-icons">search</i>
                    </span>
                </div>
            </div>
            <div class="col text-right">
                <a href="{{route('venta_pasaje.create')}}" class="btn btn-outline-primary btn-white">
                    <b>Agregar Venta de Pasaje</b> 
                </a>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4>Listado de Venta Pasaje</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary text-dark">
                                    <th>Id</th>
                                    <th>Pasajero</th>
                                    <th>CI</th>
                                    <th>Genero</th>
                                    <th>Telefono</th>
                                    <th>Itinerario</th>
                                    <th>Precio</th>
                                    <th>Horario</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($venta_pasaje as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->nombre}} {{$item->apellido}}</td>
                                            <td>{{$item->ci}}</td>
                                            <td>{{$item->genero}}</td>
                                            <td>{{$item->telefono}}</td>
                                            <td>{{$item->origen}} - {{$item->destino}}</td>
                                            <td>{{$item->precio}}</td>
                                            <td>{{$item->hora_salida}} - {{$item->hora_llegada}}</td>
                                            <td>{{\Carbon\Carbon::parse($item->fecha)->format('d-m-Y')}}</td>
                                            <td class="td-actions">
                                                <a href="{{route('venta_pasaje.edit',$item->id)}}" class="btn btn-primary">
                                                <span class="material-icons">edit</span>
                                                </a>
                                                <form action="{{route('venta_pasaje.delete',$item->id)}}" method="post"
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

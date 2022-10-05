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
                <a href="{{route('itinerario.create')}}" class="btn btn-outline-primary btn-white">
                    <b> Agregar Itinerario</b> 
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
                                    <th>Bus</th>
                                    <th>Nombre</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Dia</th>
                                    <th>Precio</th>
                                    <th>Hora salida</th>
                                    <th>Hora llegada</th>
                                    <th>Opciones</th>                                      
                                </thead>
                                <tbody>
                                    @foreach ($itinerario as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->Bus()->pluck('placa')->first()}}</td>
                                            <td>{{$item->nombre_itinerario}}</td>
                                            <td>{{$item->origen}}</td>
                                            <td>{{$item->destino}}</td>
                                            <td>{{$item->dia}}</td>
                                            <td>{{$item->precio}}</td>
                                            <td>{{$item->hora_salida}}</td>
                                            <td>{{$item->hora_llegada}}</td>
                                            <td class="td-actions">
                                                <a href="{{route('itinerario.edit',$item->id)}}" class="btn btn-primary">
                                                <span class="material-icons">edit</span>
                                                <a style="margin-left: 4%" href="{{route('itinerario.libre',$item->id)}}" class="btn btn-primary">
                                                    <span class="material-icons">chair</span>
                                                </a>
                                                <form action="{{route('itinerario.delete',$item->id)}}" method="post"
                                                    style="display: inline-block;"
                                                    onsubmit="return confirm('Este Dato solo puede ser editado')">
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

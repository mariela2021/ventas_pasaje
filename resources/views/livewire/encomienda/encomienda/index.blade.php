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
                <a href="{{route('bus_personal.create')}}" class="btn btn-outline-primary btn-white">
                    <b>Agregar Encomienda</b> 
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
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telf. Remitente</th>
                                    <th>CI</th>
                                    <th>Destinatario</th>
                                    <th>Telf. Destinatario</th>
                                    <th>Contenido</th>
                                    <th>Valor</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>                                      
                                </thead>
                                <tbody>
                                    @foreach ($encomiendas as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->apellido}}</td> 
                                            <td>{{$item->telefono_remitente}}</td>
                                            <td>{{$item->ci}}</td>
                                            <td>{{$item->destinatario}}</td>
                                            <td>{{$item->telefono_destinatario}}</td> 
                                            <td>{{$item->contenido}}</td>
                                            <td>{{$item->valor}}</td>
                                            <td>{{$item->fecha_recepcion}}</td>
                                            <td>{{$item->estado}}</td> 
                                            <td class="td-actions">
                                                <a href="{{route('encomienda.edit',$item->id)}}" class="btn btn-primary">
                                                <span class="material-icons">edit</span>
                                                </a>
                                                <form action="{{route('encomienda.delete',$item->id)}}" method="post"
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

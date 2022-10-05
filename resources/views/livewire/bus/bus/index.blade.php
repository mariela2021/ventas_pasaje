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
                <a href="{{route('bus.create')}}" class="btn btn-outline-primary btn-white">
                    <b>Agregar Bus</b> 
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4>Listado de Buses</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary text-dark">
                                    <th>Id</th>
                                    <th>Marca</th>
                                    <th>Placa</th>
                                    <th>Estado</th>
                                    <th>Capacidad</th>
                                    <th>Tipo Bus</th>
                                    <th>Opciones</th>                                        
                                </thead>
                                <tbody>
                                    @foreach ($buses as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            
                                            <td>{{$item->marca}}</td>
                                            <td>{{$item->placa}}</td> 
                                            <td>{{$item->estado}}</td>
                                            <td>{{$item->capacidad}}</td>
                                            <td>{{$item->nombre}}</td> 
                                            <td class="td-actions">
                                                <a href="{{route('bus.edit',$item->id)}}" class="btn btn-primary">
                                                <span class="material-icons">edit</span>
                                                </a>
                                                <form action="{{route('bus.delete',$item->id)}}" method="post"
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

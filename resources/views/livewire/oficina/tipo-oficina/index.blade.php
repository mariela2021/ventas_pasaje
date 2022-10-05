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
                <a href="{{route('personal_oficina.create')}}" class="btn btn-outline-primary btn-white">
                    <b>Agregar Personal de Oficina</b> 
                </a>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4>Listado de Personal del Oficina</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary text-dark">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Oficina</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($personal as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->apellido}}</td>
                                            <td>{{$item->telefono}}</td>
                                            <td>{{$item->direccion}}</td>
                                            <td>{{$item->rol}}</td>
                                            <td>{{$item->estado}}</td> 
                                            <td>{{$item->fecha_ingreso}}</td>
                                            <td>{{$item->ofi}}</td> 
                                            <td class="td-actions">
                                                <a href="{{route('personal_oficina.edit',$item->id)}}" class="btn btn-primary">
                                                <span class="material-icons">edit</span>
                                                </a>
                                                <form action="{{route('personal_oficina.delete',$item->id)}}" method="post"
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

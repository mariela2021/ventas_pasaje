@extends('layouts.app', ['activePage' => 'roles', 'titlePage' => __('Roles')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-left">
                <a href="{{route('roles.create')}}" class="btn btn-outline-primary btn-white">
                    <b>Agregar Roles</b> 
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4>Listado de Roles</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary text-dark">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->nombre}}</td>
                                            <td class="td-actions">
                                                <a href="{{route('roles.edit',$item->id)}}" class="btn btn-primary">
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
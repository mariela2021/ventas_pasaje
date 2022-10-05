@extends('layouts.app', ['activePage' => 'venta_pasaje', 'titlePage' => __('Crear Venta Pasaje')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row" style="margin-left: 10%">
            <div class="col-md-11">
                <form action="{{route('venta_pasaje.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Pasajero:</b></label>
                            <div class="col-sm-7">
                                <select name="id_pasajero" id="id_pasajero" class="form-control">
                                    <option disabled selected>Seleccione el Pasajero</option>
                                    @foreach ($pasajeros as $pasajero)
                                    <option value="{{$pasajero->id}}">{{$pasajero->nombre}} {{$pasajero->apellido}} {{$pasajero->ci}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"> <b> Fecha:</b> </label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control"
                                id="_fecha"
                                name="fecha"
                                value="{{ old('fecha') }}" autofocus>
                                @if ($errors->has('fecha'))
                                    <span class="error text-danger" for="input-nombre">
                                        {{ $errors->first('fecha') }}
                                    </span>
                                @endif
                            </div>                                
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Itinerario:</b></label>
                            <div class="col-sm-7">
                                <select name="id_itinerario" id="_itinerario" class="form-control">
                                    <option disabled selected>Seleccione el Itinerario</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Bus:</b></label>
                            <div class="col-sm-7">
                                <select name="id_bus" id="_bus" class="form-control">
                                    <option disabled selected>Seleccione la Placa</option> 
                                    
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="nombre" class="col-sm-2 col-form-label"><b>Asiento:</b></label>
                            <div class="col-sm-7">
                                <select name="asiento" id="_asiento" class="form-control">
                                    <option disabled selected>Seleccione el Asiento</option>
                                    
                                    
                                </select>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit"class="btn btn-primary">
                            <b>Guardar Datos</b>                                 
                        </button>
                        <a href="{{route('venta_pasaje.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                    </div>
                </div>
            </form>
            </div>
            
        </div>
    </div>
</div>
<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    //llenado del select itinerario
    document.getElementById('_fecha').addEventListener('change',(e)=>{
        fetch('itinerario',{
            method : 'POST',
            body: JSON.stringify({texto: e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response => {
            return response.json()
        }).then(data =>{
            var opciones = "";
            opciones+= '<option value="">Seleccione Itinerario</option>';
            for (let i in data.lista) {
            opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].nombre_itineario+' '+data.lista[i].hora_salida+'</option>';
            }
            document.getElementById("_itinerario").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })
    //llenado del select bus
    document.getElementById('_itinerario').addEventListener('change',(e)=>{
        fetch('bus',{
            method : 'POST',
            body: JSON.stringify({texto: e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response => {
            return response.json()
        }).then(dat =>{
            var opciones = "";
            opciones+= '<option value="">Seleccione la Placa</option>';
            for (let i in dat.lista) {
            opciones+= '<option value="'+dat.lista[i].id+'">'+dat.lista[i].placa+'</option>';
            }
            document.getElementById("_bus").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })
    //llenado del select asiento
    document.getElementById('_bus').addEventListener('change',(e)=>{
        fetch('asiento',{
            method : 'POST',
            body: JSON.stringify({texto: e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response => {
            return response.json()
        }).then(data =>{
            var opciones = "";
            opciones+= '<option value="">Seleccione el Asiento</option>';
            for (let i in data.lista) {
            opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].NumeroAsiento+'</option>';
            }
            document.getElementById("_asiento").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })
</script>
@endsection
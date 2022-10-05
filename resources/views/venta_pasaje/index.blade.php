@extends('layouts.app', ['activePage' => 'venta_pasaje', 'titlePage' => __('Venta Pasaje')])

@section('content')
    @livewire('pasaje.venta-pasaje.index')
@endsection
@extends('layouts.app', ['activePage' => 'pasajero', 'titlePage' => __('Pasajero')])

@section('content')
    @livewire('pasaje.pasajero.index')
@endsection
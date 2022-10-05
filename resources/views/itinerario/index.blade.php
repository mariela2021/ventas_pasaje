@extends('layouts.app', ['activePage' => 'itinerario', 'titlePage' => __('Itinerario')])

@section('content')
    @livewire('itinerario.itinerario.index')
@endsection
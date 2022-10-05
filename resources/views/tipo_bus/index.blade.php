@extends('layouts.app', ['activePage' => 'tipo_bus', 'titlePage' => __('Tipo de Bus')])

@section('content')
@livewire('bus.tipo-bus.index')
@endsection
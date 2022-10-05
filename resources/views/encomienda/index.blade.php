@extends('layouts.app', ['activePage' => 'encomienda', 'titlePage' => __('Encomienda')])

@section('content')
    @livewire('encomienda.encomienda.index')
@endsection
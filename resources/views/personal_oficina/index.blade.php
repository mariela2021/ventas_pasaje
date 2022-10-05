@extends('layouts.app', ['activePage' => 'personal_oficina', 'titlePage' => __('Personal Oficina')])

@section('content')
    @livewire('oficina.tipo-oficina.index')
@endsection
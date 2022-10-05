@extends('layouts.app', ['activePage' => 'bus_personal', 'titlePage' => __('Bus Personal')])

@section('content')
    @livewire('bus.bus-personal.index')
@endsection
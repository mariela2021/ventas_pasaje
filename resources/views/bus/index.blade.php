@extends('layouts.app', ['activePage' => 'bus', 'titlePage' => __('Bus')])

@section('content')
    @livewire('bus.bus.index')
@endsection

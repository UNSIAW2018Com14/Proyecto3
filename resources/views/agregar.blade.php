@extends ('layout')
@section ('content')

<h5 class="section-title h1">Agregar {{$name}}</h5>
@include('errors')
@if(Request::path() == 'agregar/integrantes')
    @include ('agregarIntegrantes')
@endif
@if(Request::path() == 'agregar/equipos')
    @include ('agregarEquipos')
@endif
@if(Request::path() == 'agregar/instancias')
    @include ('agregarInstancias')
@endif
@if(Request::path() == 'agregar/enfrentamientos')
    @include ('agregarEnfrentamientos')
@endif
@if(Request::path() == 'agregar/bo5s')
    @include ('agregarBo5s')
@endif

@endsection
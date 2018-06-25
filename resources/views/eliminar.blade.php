@extends ('layout')
@section ('content')

<h5 class="section-title h1">Eliminar {{$name}}</h5>
@include('errors')
@if(Request::path() == 'eliminar/integrantes')
    @include ('eliminarIntegrantes')
@endif
@if(Request::path() == 'eliminar/equipos')
    @include ('eliminarEquipos')
@endif
@if(Request::path() == 'eliminar/instancias')
    @include ('eliminarInstancias')
@endif
@if(Request::path() == 'eliminar/enfrentamientos')
    @include ('eliminarEnfrentamientos')
@endif
@if(Request::path() == 'eliminar/bo5s')
    @include ('eliminarBo5s')
@endif

@endsection
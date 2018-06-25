@extends ('layout')
@section ('content')
<h5 class="section-title h1">Modificar {{$name}}</h5>
@include('errors')
@if(Request::path() == 'modificar/integrantes')
    @include ('modificarIntegrantes')
@endif
@if(Request::path() == 'modificar/equipos')
    @include ('modificarEquipos')
@endif
@if(Request::path() == 'modificar/instancias')
    @include ('modificarInstancias')
@endif
@if(Request::path() == 'modificar/enfrentamientos')
    @include ('modificarEnfrentamientos')
@endif
@if(Request::path() == 'modificar/bo5s')
    @include ('modificarBo5s')
@endif

@endsection
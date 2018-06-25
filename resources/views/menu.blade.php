<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  @if (Auth::check())
    <ul class="navbar-nav mr-auto">
      @if(Request::path() == '/')           
        <li class="nav-item"><a href="/agregar/integrantes"class="nav-link">Administrar Integrantes</a></li>
        <li class="nav-item"><a href="/agregar/equipos"class="nav-link">Administrar Equipos</a></li>
        <li class="nav-item"><a href="/agregar/instancias"class="nav-link">Administrar Instancias</a></li>
        <li class="nav-item"><a href="/agregar/enfrentamientos"class="nav-link">Administrar Enfrentamientos</a></li>
        <li class="nav-item"><a href="/agregar/bo5s"class="nav-link">Administrar Bo5s</a></li>   
        @else
        @php
          $agregar = $routes[0];
          $modificar = $routes[1];
          $eliminar = $routes[2];
        @endphp
        <li class="nav-item"><a href="{{$agregar}}"class="nav-link">Agregar</a></li>
        <li class="nav-item"><a href="{{$modificar}}"class="nav-link">Modificar</span></a></li>
        <li class="nav-item"><a href="{{$eliminar}}" class="nav-link">Eliminar</a></li>    
      @endif
    </ul>
    @endif
    <ul class="nav navbar-nav navbar-right">
      @if (Auth::check())
        <p class="navbar-text">{{Auth::user()->email}}</p>
        <li class="nav-item"><a type="button" href="/logout/"class="btn btn-primary">Logout</a></li>    
      @else
        <li class="nav-item"><a type="button" href="/login" class="btn btn-primary">Login</a></li>
      @endif 
      </ul>     
  </div>
</nav>
<div class="container-fluid">
    <div class= "col-sm-6">
        <form method ="POST" action ="/agregar/equipos">
        {{csrf_field()}}
        <div class="form-group">
        <label for="nombre"></label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required autofocus>
        <small class="form-text text-muted">Se requiere completar este campo.</small>
        </div>
        <div class="form-group">
        <label for="institucion"></label>
        <input type="text" class="form-control" id="institucion" name= "institucion" placeholder="Institucion" required>
        <small class="form-text text-muted">Se requiere completar este campo.</small>
        </div>
        <div class="form-group">
        <legend class="col-form-label">Foto</legend>
        <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <hr>
        <div class="form-group">
            <label for="integrantesDisponibles"><legend class="col-form-label">Jugadores Disponibles</legend></label>
            <small class="form-text text-muted">Utilice la tecla "ctrl" para seleccionar múltiples jugadores.</small>
            <select name="integrantesDisponibles[]" multiple class="form-control" id="integrantesDisponibles">
            @foreach ($integrantes->all() as $integrante)
                @if ($integrante-> nombreEquipo == null) 
                    <option>{{$integrante-> nickname}}</option>
                @endif
            @endforeach
            </select>
            <small class="form-text text-muted">Se requiere completar este campo. Por favor seleccione exactamente 3 jugadores</small>
        </div>
        <button type="submit" class="btn btn-primary, boton"><div class= "texto-boton"> Crear Equipo</button>
        </form>
    </div>
        <div class="col-sm-6">     
        <div class="integrantes">
            <h2><div class="titulos">Listado de equipos</div> </h2>
            <ul class="list-group " id ="muestraEquipos">
                @foreach ($equipos->all() as $equipo)  
                    <li class="list-group-item muestras" id="equipo{{$equipo->nombre}}"> {{$equipo->nombre}} </li>  
                @endforeach
            </ul>               
        </div>
    </div>

    </div>
</div>
<link href="{{ asset('css/estiloFormulario.css') }}" rel="stylesheet">

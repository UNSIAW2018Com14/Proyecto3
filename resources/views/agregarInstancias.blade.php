<div class="container-fluid">
    <div class= "col-sm-6"> 
        <form method ="POST" action ="/agregar/instancias">
            {{csrf_field()}}
            <div class="form-group">
                <label for="idInstancia"></label>
                <input type="number" class="form-control" id="idInstancia" name="idInstancia" placeholder="ID" required>
                <small class="form-text text-muted">Se requiere completar este campo.</small>
            </div>
            <div class="form-group">
                <label for="fechaInicio"></label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                <small class="form-text text-muted">Se requiere completar este campo.</small>
            </div>
            <div class="form-group">
                <label for="fechaInicio">Fecha de inicio</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" placeholder="Fecha de inicio" required>
                <small class="form-text text-muted">Se requiere completar este campo.</small>
            </div>
            <div class="form-group">
                <label for="fechaInicio">Fecha de fin</label>
                <input type="date" class="form-control" id="fechaFin" name="fechaFin" placeholder="Fecha de fin" required>
                <small class="form-text text-muted">Se requiere completar este campo.</small>
            </div>
            <div class="form-group">
                <label for="enfrentamientosDisponibles">Enfrentamientos Disponibles</label>
                <small class="form-text text-muted">Utilice la tecla "ctrl" para seleccionar múltiples enfrentamientos.</small>
                <select name="enfrentamientosDisponibles[]" multiple class="form-control" id="enfrentamientosDisponibles" required>
                    @foreach ($enfrentamientos->all() as $enfrentamiento)
                        <option value="{{$enfrentamiento-> idEnfrentamiento}}">Enfrentamiento {{$enfrentamiento-> idEnfrentamiento}}: {{$enfrentamiento-> equipo1}} vs {{$enfrentamiento-> equipo2}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Se requiere completar este campo.</small>
            </div>
            <button type="submit" class="btn btn-primary, boton"><div class="texto-boton"> Crear Instancia</div></button>
        </form>
    </div>
    <div class="col-sm-6">     
        <div class="instancias">
            <h2><div class="titulos">Listado de instancias</div> </h2>
            <ul class="list-group " id ="muestraInstancias">
                @foreach ($instancias->all() as $instancia)  
                    <li class="list-group-item muestras" id="instancia{{$instancia->idInstancia}}"> {{$instancia->nombre}}: Desde {{$instancia->fechaInicio}} hasta {{$instancia->fechaFin}}</li>  
                @endforeach
            </ul>               
        </div>
    </div>
</div>
<link href="{{ asset('css/estiloFormulario.css') }}" rel="stylesheet">
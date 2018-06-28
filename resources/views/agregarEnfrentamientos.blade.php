<script type="text/javascript" src="/js/enfrentamientos.js" async></script>
<div class="container-fluid">
    <div class= "col-sm-6"> 
        <form method ="POST" action ="/agregar/enfrentamientos">
            {{csrf_field()}}
            <div class="form-group">
                <label for="id"></label>
                <input type="number" class="form-control" id="id" name="id" placeholder="ID" required autofocus>
                <small class="form-text text-muted">Se requiere completar este campo.</small>
            </div>
            <div class="form-group">
                <label for="equipo1">Equipo 1</label>
                    <select name="equipo1" class="form-control" required>
                    <option value="" disabled selected hidden> Choose...</option>
                    @foreach ($equipos->all() as $equipo)
                        <option>{{$equipo-> nombre}}</option>
                    @endforeach
                    </select>
                <small class="form-text text-muted">Se requiere completar este campo.
            </div>
            <div class="form-group">
                <label for="equipo2">Equipo 2</label>
                <select name="equipo2" class="form-control" required>
                    <option value="" disabled selected hidden> Choose...</option>
                    @foreach ($equipos->all() as $equipo)
                        <option>{{$equipo-> nombre}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Se requiere completar este campo.
            </div>
            <div class="form-group">
                <label for="editor"></label>
                <input type="text" class="form-control" id="editor" name= "editor" placeholder="Editor" required>
            </div>
            <div class="form-group">
                <hr>
                <label for="bo5sDisponibles"><legend class="col-form-label">Bo5s Disponibles</legend></label>
                <small class="form-text text-muted">Utilice la tecla "ctrl" para seleccionar múltiples bo5s.</small>
                <select name="bo5sDisponibles[]" multiple class="form-control" id="bo5sDisponibles" required>
                    @foreach ($bo5s->all() as $bo5)
                        <option value="{{$bo5-> idBo5}}">Bo5 {{$bo5-> idBo5}}: {{$bo5-> nickIntegrante1}} vs {{$bo5-> nickIntegrante2}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Se requiere completar este campo.</small>
            </div>
            <button type="submit" class="btn btn-success btn-md, boton"><div class="texto-boton"> Crear Enfrentamiento</div></button>
        </form>
    </div>
    <div class="col-sm-6">     
        <div class="enfrentamientos">
            <h2><div class="titulos">Listado de enfrentamientos</div> </h2>
            <ul class="list-group " id ="muestraEnfrentamientos">
                @foreach ($enfrentamientos->all() as $enfrentamiento)  
                    <li class="list-group-item muestras" id="enfrentamiento{{$enfrentamiento->id}}"> {{$enfrentamiento->equipo1}} vs {{$enfrentamiento->equipo2}}</li>  
                @endforeach
            </ul>               
        </div>
    </div>
</div>
<link href="{{ asset('css/estiloFormulario.css') }}" rel="stylesheet">
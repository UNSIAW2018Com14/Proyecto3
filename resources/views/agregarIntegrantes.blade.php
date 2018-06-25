<div class="container-fluid">
    <div class= "col-sm-6">
        <form method ="POST" action ="/agregar/integrantes">
        {{csrf_field()}}
        
        <div class="form-group">         
        <label for="nombre"></label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required autofocus>
        <small class="form-text text-muted">Se requiere completar este campo.</small>
        </div>
        <div class="form-group">
        <label for="apellido"></label>
        <input type="text" class="form-control" id="apellido" name= "apellido" placeholder="Apellido" required>
        <small class="form-text text-muted">Se requiere completar este campo.</small>
        </div>
        <div class="form-group">
            <label for="nickname"></label>
            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" required>
            <small class="form-text text-muted">Se requiere completar este campo.</small>
        </div>
        <div class="form-group">
            <label for="DNI"></label>
            <input type="text" class="form-control" id="DNI" name="DNI" placeholder="DNI" required>
            <small class="form-text text-muted">Se requiere completar este campo.</small>
        </div>
        <div class="form-group">
            <label for="Edad"></label>
            <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad">
        </div>
        <fieldset class="form-group">
                <legend class="col-form-label">Sexo</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="gridRadios1" value="option1" checked>
                    <label class="form-check-label, etiqueta-tab" for="gridRadios1">
                      Femenino
                    </label>
                </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="gridRadios2" value="option2">
                <label class="form-check-label, etiqueta-tab" for="gridRadios2">
                    Masculino
                </label>
            </div>
    </fieldset>
        <div class="form-group">
        <legend class="col-form-label">Foto</legend>
        <input type="file" class="form-control-file" id="foto" name="foto">
        </div>

        <div class="form-group">
            <label for="Carta Favorita"></label>
            <input type="text" class="form-control" id="cartaFavorita" name="cartaFavorita" placeholder="Carta Favorita">
        </div>

        <div class="form-group">
            <label for="Clase Favorita"></label>
            <input type="text" class="form-control" id="claseFavorita" name="claseFavorita" placeholder="Clase Favorita">
        </div>

        <button type="submit" class="btn btn-primary, boton"> <div class="texto-boton">Crear Integrante</div></button>
        </form>
    </div>
        <div class="col-sm-6">     
        <div class="integrantes">
            <h2><div class="titulos">Listado de integrantes</div> </h2>
            <ul class="list-group " id ="muestraIntegrantes">
                @foreach ($integrantes->all() as $integrante)  
                    <li class="list-group-item muestras" id="integrante{{$integrante->nickname}}"> {{$integrante->nickname}} </li>  
                @endforeach
            </ul>               
        </div>
    </div>

    </div>
</div>
<link href="{{ asset('css/estiloFormulario.css') }}" rel="stylesheet">

<div class="container-fluid">       
    <div class="row top-buffer">
        @foreach ($equipos->all() as $equipo) 
            <div class="col-xs-12 col-sm-6 col-md-4">       
                <div class="card">
                    <div class="card-body text-center mt-4">
                        <h3 class="card-title">Equipo: {{ $equipo->nombre }}</h3>
                        <form id="formModificar{{$equipo->nombre}}" method="POST" action="/modificar/equipos">
                            {{ csrf_field() }}
                            <h5 class="card-title">Modificar Nombre</h5>
                            <div class="form-row">      
                                <div class="col">
                                    <input type="hidden" name="nombreViejo" class="form-control center-block" value="{{$equipo->nombre}}">
                                </div>
                            </div>
                            <div class="form-row">      
                                <div class="col">
                                <input type="text" name="nombre" class="form-control center-block" value="{{$equipo->nombre}}" autofocus required>
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Institucion</h5>
                            <div class="form-row">      
                                <div class="col">
                                    <input type="text" name="institucion" class="form-control center-block" value="{{$equipo->institucion}}"required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="integrantesDisponibles"><legend class="col-form-label">Jugadores Disponibles</legend></label>
                                <small class="form-text text-muted">Utilice la tecla "ctrl" para seleccionar múltiples jugadores.</small>
                                <select name="integrantesDisponibles[]" multiple class="form-control" id="integrantesDisponibles">
                                @foreach ($equipo->integrantes as $i)
                                        <option selected>{{$i}}</option>
                                @endforeach
                                @foreach ($integrantes->all() as $integrante)
                                    @if ($integrante-> nombreEquipo == null) 
                                        <option>{{$integrante-> nickname}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>         
                        </form>
                        <button type="submit" form="formModificar{{$equipo->nombre}}" class="btn btn-success btn-md">Modificar</button>        
                    </div>
                </div>
                <br>
                <br>
            </div>
        @endforeach
    </div>
</div>
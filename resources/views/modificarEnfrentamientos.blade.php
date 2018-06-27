<div class="container-fluid">       
    <div class="row top-buffer">
        @foreach ($enfrentamientos->all() as $enfrentamiento) 
            <div class="col-xs-12 col-sm-6 col-md-4">       
                <div class="card">
                    <div class="card-body text-center mt-4">
                        <h3 class="card-title">Enfrentamiento: {{ $enfrentamiento->equipo1 }} vs {{ $enfrentamiento->equipo2 }}</h3>
                        <form id="formModificar{{$enfrentamiento->idEnfrentamiento}}" method="POST" action="/modificar/enfrentamientos">
                            {{ csrf_field() }}
                            <div class="form-row">      
                                <div class="col">
                                    <input type="hidden" name="idEnfrentamiento" class="form-control center-block" value="{{$enfrentamiento->idEnfrentamiento}}">
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Equipo 1</h5>
                            <div class="form-row">      
                                <div class="col">
                                <label for="equipo1"></label>
                                    <select name="equipo1" class="form-group" required>
                                    @foreach ($equipos->all() as $equipo)
                                        @if ($equipo->nombre == $enfrentamiento->equipo1)
                                        <option selected >{{$equipo-> nombre}}</option>
                                        @else
                                        <option>{{$equipo-> nombre}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Equipo 2</h5>
                            <div class="form-row">      
                                <div class="col">
                                <label for="equipo2"></label>
                                    <select name="equipo2" class="form-group" required>
                                    @foreach ($equipos->all() as $equipo)
                                        @if ($equipo->nombre == $enfrentamiento->equipo2)
                                        <option selected >{{$equipo-> nombre}}</option>
                                        @else
                                        <option>{{$equipo-> nombre}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bo5sDisponibles"><legend class="col-form-label">Bo5s Disponibles</legend></label>
                                <small class="form-text text-muted">Utilice la tecla "ctrl" para seleccionar múltiples bo5s.</small>
                                <select name="bo5sDisponibles[]" multiple class="form-control" id="bo5sDisponibles">
                                @foreach ($bo5s->all() as $bo5)
                                @if(in_array($bo5->idBo5, $enfrentamiento->bo5))
                                    <option selected >{{$bo5-> nickIntegrante1}} vs {{$bo5-> nickIntegrante2}}</option>
                                @else 
                                    <option>{{$bo5-> nickIntegrante1}} vs {{$bo5-> nickIntegrante2}}</option>
                                @endif          
                                @endforeach
                                </select>
                            </div>           
                        </form>
                        <button type="submit" form="formModificar{{$enfrentamiento->idEnfrentamiento}}" class="btn btn-success btn-md, boton"><div class= texto-boton>Modificar</button>
                        <div class="text-center">
                        <!-- Button HTML (to Trigger Modal) -->
                        <a href="#myModal{{$enfrentamiento->idEnfrentamiento}}" class="trigger-btn" data-toggle="modal"><div class="boton, item">Eliminar enfrentamiento {{$enfrentamiento->equipo1}} vs {{$enfrentamiento->equipo2}}</div></a>
                        </div>
                        <!-- Modal HTML -->
                        <div id="myModal{{$enfrentamiento->idEnfrentamiento}}" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="icon-box">
                                            <i class="material-icons">&#xE5CD;</i>
                                        </div>				
                                        <h4 class="modal-title">Confirmacion:</h4>	
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Esta seguro que desea eliminar el enfrentamiento: {{$enfrentamiento->equipo1}} vs {{$enfrentamiento->equipo2}}?</p>
                                    </div>
                                    <div class="modal-footer">	
                                        <form id="formEliminar{{$enfrentamiento->idEnfrentamiento}}" method="POST" action="/eliminar/enfrentamientos">
                                            {{ csrf_field() }}
                                            <div class="form-row">      
                                                <div class="col">
                                                <input type="hidden" name="idEnfrentamiento" class="form-control" value="{{$enfrentamiento->idEnfrentamiento}}" readonly></input>
                                                </div>
                                            </div>
                                            </form>
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" form="formEliminar{{$enfrentamiento->idEnfrentamiento}}" class="btn btn-success btn-md">Eliminar</button> 
                    </div>
                </div>
            </div>
        </div>        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
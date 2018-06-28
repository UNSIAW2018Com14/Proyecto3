<link href="/css/centerBlock.css" rel="stylesheet">
<div class="container-fluid">       
    <div class="row top-buffer"> 
        @foreach ($integrantes->all() as $integrante) 
            <div class="col-xs-12 col-sm-6 col-md-4">       
                <div class="card">
                    <div class="card-body text-center mt-4">
                        <h3 class="card-title">Jugador: {{ $integrante->nickname }}</h3>
                        <form id="formModificar{{$integrante->nickname}}" method="POST" action="/modificar/integrantes">
                            {{ csrf_field() }}
                            <h5 class="card-title">Modificar Nickname</h5>
                            <div class="form-row">      
                                <div class="col">
                                    <input type="hidden" name="nicknameViejo" class="form-control center-block" value="{{$integrante->nickname}}">
                                </div>
                            </div>
                            <div class="form-row">      
                                <div class="col">
                                <input type="text" name="nickname" class="form-control center-block" value="{{$integrante->nickname}}" autofocus required>
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Nombre</h5>
                            <div class="form-row">      
                                <div class="col">
                                    <input type="text" name="nombre" class="form-control center-block" value="{{$integrante->nombre}}"required>
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Apellido</h5>
                            <div class="form-row">      
                                <div class="col">
                                    <input type="text" name="apellido" class="form-control center-block" value="{{$integrante->apellido}}"required>
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Edad</h5>
                            <div class="form-row">      
                                <div class="col">
                                    <input type="number" name="edad" class="form-control center-block" value="{{$integrante->edad}}">
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Carta Favorita</h5>
                            <div class="form-row">      
                                <div class="col">
                                    <input type="text" name="cartaFavorita" class="form-control center-block" value="{{$integrante->cartaFavorita}}">
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Clase Favorita</h5>
                            <div class="form-row">      
                                <div class="col">
                                    <input type="text" name="claseFavorita" class="form-control center-block" value="{{$integrante->claseFavorita}}">
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Equipo</h5>
                            <div class="form-row">      
                                <div class="col">
                                    <select name="nombreEquipo" class="form-control" required>
                                    <option value="{{$integrante->nombreEquipo}}"selected> {{$integrante->nombreEquipo}}</option>
                                    @foreach ($equipos->all() as $equipo)
                                    @if ($equipo->nombre != $integrante->nombreEquipo )
                                        <option>{{$equipo-> nombre}}</option>
                                    @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>       
                        </form>
                        <button type="submit" form="formModificar{{$integrante->nickname}}" class="btn btn-success btn-md, boton"><div class="texto-boton">Modificar</div></button>
                        <div class="text-center">
                        <!-- Button HTML (to Trigger Modal) -->
                        <a href="#myModal{{$integrante->nickname}}" class="trigger-btn" data-toggle="modal"><div class="boton, item">Eliminar Integrante {{$integrante->nickname}}</div></a>
                    </div>                   
                <!-- Modal HTML -->
                        <div id="myModal{{$integrante->nickname}}" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="icon-box">
                                    <i class="material-icons">&#xE5CD;</i>
                                </div>				
                                <h4 class="modal-title">Confimrmacion:</h4>	
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Esta seguro que desea eliminar el integrante: {{$integrante->nickname}}?</p>
                            </div>
                            <div class="modal-footer">	
                                <form id="formEliminar{{$integrante->nickname}}" method="POST" action="/eliminar/integrantes">
                                    {{ csrf_field() }}
                                    <div class="form-row">      
                                        <div class="col">
                                        <input type="hidden" name="nickname" class="form-control" value="{{$integrante->nickname}}" readonly></input>
                                        </div>
                                    </div>
                                    </form>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" form="formEliminar{{$integrante->nickname}}" class="btn btn-success btn-md">Eliminar</button> 
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
<link href="{{ asset('css/estiloFormulario.css') }}" rel="stylesheet">


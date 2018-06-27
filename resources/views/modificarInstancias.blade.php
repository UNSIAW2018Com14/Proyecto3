<div class="container-fluid">       
    <div class="row top-buffer">
        @foreach ($instancias->all() as $instancia) 
            <div class="col-xs-12 col-sm-6 col-md-4">       
                <div class="card">
                    <div class="card-body text-center mt-4">
                        <h3 class="card-title">Instancia: {{ $instancia->nombre }}</h3>
                        <form id="formModificar{{$instancia->nombre}}" method="POST" action="/modificar/instancias">
                            {{ csrf_field() }}
                            <div class="form-row">      
                                <div class="col">
                                    <input type="hidden" name="nombreViejo" class="form-control center-block" value="{{$instancia->nombre}}">
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Nombre</h5>
                            <div class="form-row">      
                                <div class="col">
                                <input type="text" name="nombre" class="form-control center-block" value="{{$instancia->nombre}}" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="enfrentamientosDisponibles"><legend class="col-form-label">Enfrentamientos Disponibles</legend></label>
                                <small class="form-text text-muted">Utilice la tecla "ctrl" para seleccionar múltiples enfrentamientos.</small>
                                <select name="enfrentamientosDisponibles[]" multiple class="form-control" id="enfrentamientosDisponibles">
                                @foreach ($enfrentamientos->all() as $enfrentamiento)
                                        @if(in_array($enfrentamiento->idEnfrentamiento, $instancia->enfrentamientos))
                                            <option selected>{{$enfrentamiento-> equipo1}} vs {{$enfrentamiento-> equipo2}}</option>
                                        @else 
                                         <option >{{$enfrentamiento-> equipo1}} vs {{$enfrentamiento-> equipo2}}</option>  
                                        @endif
                                @endforeach
                                </select>
                            </div>         
                        </form>
                        <button type="submit" form="formModificar{{$instancia->nombre}}" class="btn btn-success btn-md">Modificar</button>
                        <div class="text-center">
		<!-- Button HTML (to Trigger Modal) -->
		<a href="#myModal{{$instancia->idInstancia}}" class="trigger-btn" data-toggle="modal">Eliminar instancia {{$instancia->nombre}}</a>
        </div>
        <!-- Modal HTML -->
        <div id="myModal{{$instancia->idInstancia}}" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>				
                    <h4 class="modal-title">Are you sure?</h4>	
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete instancia {{$instancia->nombre}}? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">	
                    <form id="formEliminar{{$instancia->idInstancia}}" method="POST" action="/eliminar/instancias">
                        {{ csrf_field() }}
                        <div class="form-row">      
                            <div class="col">
                            <input type="hidden" name="idInstancia" class="form-control" value="{{$instancia->idInstancia}}" readonly></input>
                            </div>
                        </div>
                        </form>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                        <button type="submit" form="formEliminar{{$instancia->idInstancia}}" class="btn btn-success btn-md">Eliminar</button> 
                </div>
            </div>
        </div>
        </div>        
                    </div>
                </div>
                <br>
                <br>
            </div>
        @endforeach
    </div>
</div>
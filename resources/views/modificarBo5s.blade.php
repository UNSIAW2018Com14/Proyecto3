<script type="text/javascript" src="/js/bo5s.js" async></script>
<div class="container-fluid">       
    <div class="row top-buffer">
        @foreach ($bo5s->all() as $bo5) 
            <div class="col-xs-12 col-sm-6 col-md-4">       
                <div class="card">
                    <div class="card-body text-center mt-4">
                        <h3 class="card-title">Bo5: {{ $bo5->nickIntegrante1 }} vs {{ $bo5->nickIntegrante2 }}</h3>
                        <form id="formModificar{{$bo5->idBo5}}" method="POST" action="/modificar/bo5s">
                            {{ csrf_field() }}
                            <div class="form-row">      
                                <div class="col">
                                    <input type="hidden" name="idBo5" class="form-control center-block" value="{{$bo5->idBo5}}">
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Integrante 1</h5>
                            <div class="form-row">      
                                <div class="col">
                                <label for="nickIntegrante1"></label>
                                    <select name="nickIntegrante1" class="form-group" required>
                                    @foreach ($integrantes->all() as $integrante)
                                        @if ($integrante->nickname == $bo5->nickIntegrante1)
                                        <option selected >{{$integrante-> nickname}}</option>
                                        @else
                                        <option>{{$integrante-> nickname}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <h5 class="card-title">Modificar Equipo 2</h5>
                            <div class="form-row">      
                                <div class="col">
                                <label for="equipo2"></label>
                                    <select name="nickIntegrante2" class="form-group" required>
                                    @foreach ($integrantes->all() as $integrante)
                                        @if ($integrante->nickname == $bo5->nickIntegrante2)
                                        <option selected >{{$integrante-> nickname}}</option>
                                        @else
                                        <option>{{$integrante-> nickname}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>         
                        </form>
                        <button type="submit" form="formModificar{{$bo5->idBo5}}" class="btn btn-success btn-md">Modificar</button>
                        <div class="text-center">
                        <!-- Button HTML (to Trigger Modal) -->
                        <a href="#myModal{{$bo5->idBo5}}" class="trigger-btn" data-toggle="modal">Eliminar bo5 {{$bo5->nickIntegrante1}} vs {{$bo5->nickIntegrante2}}</a>
                    </div>

                <!-- Modal HTML -->
                <div id="myModal{{$bo5->idBo5}}" class="modal fade">
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
                                <p>Do you really want to delete enfrentamiento {{$bo5->nickIntegrante1}} vs {{$bo5->nickIntegrante2}}? This process cannot be undone.</p>
                            </div>
                            <div class="modal-footer">	
                                <form id="formEliminar{{$bo5->idBo5}}" method="POST" action="/eliminar/bo5s">
                                    {{ csrf_field() }}
                                    <div class="form-row">      
                                        <div class="col">
                                        <input type="hidden" name="idBo5" class="form-control" value="{{$bo5->idBo5}}" readonly></input>
                                        </div>
                                    </div>
                                    </form>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                    <button type="submit" form="formEliminar{{$bo5->idBo5}}" class="btn btn-success btn-md">Eliminar</button> 
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
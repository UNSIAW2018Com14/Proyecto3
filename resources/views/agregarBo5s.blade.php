<script type="text/javascript" src="/js/enfrentamientos.js" async></script>
<script type="text/javascript" src="/js/bo5s.js" async></script>
<link href="{{ asset('css/estiloFormulario.css') }}" rel="stylesheet">
<div class="container-fluid">
    <div class= "col-sm-6"> 
        <form method ="POST" action ="/agregar/bo5s">
            {{csrf_field()}}
            <div class="form-group">
                <label for="idBo5">ID</label>
                <input type="number" class="form-control" id="idBo5" name="idBo5" placeholder="ID" required>
                <small class="form-text text-muted">Se requiere completar este campo.</small>
            </div>
            <div class="form-group">
                <label for="dia">Día</label>
                <input type="date" class="form-control" id="dia" name="dia" placeholder="Día" required>
                <small class="form-text text-muted">Se requiere completar este campo.</small>
            </div>
            <div class="form-group">
                <label for="equipo1">Integrante 1</label>
                    <select name="nickIntegrante1" class="form-control" required>
                    <option value="" disabled selected hidden> Choose...</option>
                    @foreach ($integrantes->all() as $integrante)
                        <option>{{$integrante-> nickname}}</option>
                    @endforeach
                    </select>
                <small class="form-text text-muted">Se requiere completar este campo.
            </div>
            <div class="form-group">
                <label for="equipo2">Integrante 2</label>
                <select name="nickIntegrante2" class="form-control" required>
                    <option value="" disabled selected hidden> Choose...</option>
                    @foreach ($integrantes->all() as $integrante)
                        <option>{{$integrante-> nickname}}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Se requiere completar este campo.
            </div>
            <button type="submit" class="btn btn-success btn-md, boton"><div class="texto-boton"> Crear Bo5</div></button>
        </form>
    </div>
    <div class="col-sm-6">     
        <div class="bo5s">
            <h2><div class="titulos">Listado de bo5s</div> </h2>
            <ul class="list-group " id ="muestraBo5s">
                @foreach ($bo5s->all() as $bo5)  
                    <li class="list-group-item muestras" id="bo5{{$bo5->idBo5}}"> {{$bo5->nickIntegrante1}} vs {{$bo5->nickIntegrante2}}</li>  
                @endforeach
            </ul>               
        </div>
    </div>
</div>
<link href="{{ asset('css/estiloFormulario.css') }}" rel="stylesheet">
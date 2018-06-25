<link href="/css/eliminar.css" rel="stylesheet">
@foreach ($equipos->all() as $equipo)
	<div class="text-center">
		<!-- Button HTML (to Trigger Modal) -->
		<a href="#myModal{{$equipo->nombre}}" class="trigger-btn" data-toggle="modal">Eliminar equipo {{$equipo->nombre}}</a>
	</div>

<!-- Modal HTML -->
<div id="myModal{{$equipo->nombre}}" class="modal fade">
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
				<p>Esta seguro que desea eliminar el equipo: {{$equipo->nombre}}?</p>
			</div>
			<div class="modal-footer">	
				<form id="formEliminar{{$equipo->nombre}}" method="POST" action="/eliminar/equipos">
					{{ csrf_field() }}
					<div class="form-row">      
						<div class="col">
						<input type="hidden" name="nombre" class="form-control" value="{{$equipo->nombre}}" readonly></input>
						</div>
					</div>
					</form>
					<button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
					<button type="submit" form="formEliminar{{$equipo->nombre}}" class="btn btn-success btn-md">Eliminar</button> 
			</div>
		</div>
	</div>
</div>
@endforeach     


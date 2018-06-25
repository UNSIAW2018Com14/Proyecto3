<link href="/css/eliminar.css" rel="stylesheet">
@foreach ($enfrentamientos->all() as $enfrentamiento)
	<div class="text-center">
		<!-- Button HTML (to Trigger Modal) -->
		<a href="#myModal{{$enfrentamiento->idEnfrentamiento}}" class="trigger-btn" data-toggle="modal">Eliminar enfrentamiento {{$enfrentamiento->equipo1}} vs {{$enfrentamiento->equipo2}}</a>
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
@endforeach     


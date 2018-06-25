<link href="/css/eliminar.css" rel="stylesheet">
@foreach ($instancias->all() as $instancia)
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
@endforeach     


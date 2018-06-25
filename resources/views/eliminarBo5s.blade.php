<link href="/css/eliminar.css" rel="stylesheet">
@foreach ($bo5s->all() as $bo5)
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
@endforeach     
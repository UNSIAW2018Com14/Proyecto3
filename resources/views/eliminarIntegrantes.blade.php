
<link href="/css/eliminar.css" rel="stylesheet">
<link href="/css/estiloFormulario.css" rel="stylesheet">

@foreach ($integrantes->all() as $integrante)
	<div class="text-center">
		<!-- Button HTML (to Trigger Modal) -->
		<a href="#myModal{{$integrante->nickname}}" class="trigger-btn" data-toggle="modal"><div class="item">Eliminar Integrante {{$integrante->nickname}}</div></a>
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
@endforeach     


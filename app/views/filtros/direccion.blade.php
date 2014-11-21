<div class="col-sm-6">
		<legend>Dirección</legend>
	<div class="input-group">
		<span class="input-group-addon">
			{{ Form::checkbox('chkdireccion',1)}}
		</span>
		{{Form::select('direccion', $direcciones,null, array('class' => 'form-control'))}}
	</div>
</div>

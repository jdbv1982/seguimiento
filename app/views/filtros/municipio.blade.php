<div class="col-sm-6">
	<br>
		<legend>Municipio</legend>
	<div class="input-group">
		<span class="input-group-addon">
			{{ Form::checkbox('chkmunicipio',1)}}
		</span>
		{{Form::select('municipio', $municipios,null, array('class' => 'form-control'))}}
	</div>
</div>

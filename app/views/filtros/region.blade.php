<div class="col-sm-6">
	<br>
		<legend>Region</legend>
	<div class="input-group">
		<span class="input-group-addon">
			{{ Form::checkbox('chkregion',1)}}
		</span>
		{{Form::select('region', $regiones,null, array('class' => 'form-control'))}}
	</div>
</div>

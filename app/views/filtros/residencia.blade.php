<div class="col-sm-6">
	<br>
		<legend>Residencia</legend>
	<div class="input-group">
		<span class="input-group-addon">
			{{ Form::checkbox('chkresidencia',1)}}
		</span>
		{{Form::select('residencia', $residencias,null, array('class' => 'form-control'))}}
	</div>
</div>

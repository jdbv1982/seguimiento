<div class="form-group">
	{{ Form::label($name,$label) }}
	{{ $control }}
	@if($error)
		<p class="label label-danger">{{$error}}</p>
	@endif
</div>

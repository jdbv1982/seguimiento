@extends('layouts/layout')


@section('content')
<div class="col-xs-12 col-sm-6 col-sm-offset-3">
	<h2>Crear Nuevo Usuario</h2>

	{{ Form::open(['route' => 'register-user', 'method'=>'POST','role'=>'form','novalidate'])}}

	{{ App->make('field')->input('text','full_name') }}


	<div class="form-group">
		{{ Form::label('full_name','Nombre de Usuario') }}
		{{ Form::text('full_name',null,['class'=>'form-control']) }}
		{{ $errors->first('full_name','<p class="label label-danger">:message</p>') }}
	</div>


	<div class="form-group">
		{{ Form::label('email','Correo Electronico') }}
		{{ Form::email('email',null,['class'=>'form-control']) }}
		{{ $errors->first('email','<p class="label label-danger">:message</p>') }}
	</div>

	<div class="form-group">
		{{ Form::label('password','Contraseña') }}
		{{ Form::password('password',['class'=>'form-control']) }}
		{{ $errors->first('password','<p class="label label-danger">:message</p>') }}
	</div>

	<p>
		{{ Form::submit('Crear', ['class'=>'btn btn-success']) }}
	</p>

	{{Form::close()}}

</div>
@stop

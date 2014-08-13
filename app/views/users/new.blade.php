@extends('layouts/layout')


@section('content')
<div class="col-xs-12 col-sm-6 col-sm-offset-3">
	<h2>Crear Nuevo Usuario</h2>

	{{ Form::open(['route' => 'register-user', 'method'=>'POST','role'=>'form','novalidate'])}}

	{{ Field::text('full_name') }}
	{{Field::email('email')}}
	{{Field::password('password')}}

	<p>
		{{ Form::submit('Crear', ['class'=>'btn btn-success']) }}
		{{ HTML::link('list', 'Cancelar', ['class'=>'btn btn-default']) }}

	</p>

	{{Form::close()}}

</div>
@stop

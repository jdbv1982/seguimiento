@extends('layouts/layout')

@section('content')
<div class="col-xs-10 col-xs-offset-1">
	<h2>Cambio de Contraseña</h2>
<div class="row col-sm-3 col-sm-offset-3">
	{{Form::open(['route'=>'update-password','method'=>'post','role'=>'form','class'=>'form-horizontal'])}}

    {{Field::password('password',['required'])}}

    <p>
        {{ Form::submit('Actualizar', ['class'=>'btn btn-success']) }}
        {{ HTML::link('/', 'Cancelar', ['class'=>'btn btn-default']) }}
    </p>

	{{Form::close()}}
</div>
</div>
@stop

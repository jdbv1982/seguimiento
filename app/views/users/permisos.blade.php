@extends('layouts/layout')

@section('content')
<h3>Permisos de Usuarios</h3>
<p><strong>Usuario: {{$user->full_name}}</strong></p>
{{ Form::open(['route'=> ['permisos-update',$user->id],'method'=>'POST']) }}
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Activo</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($permisos as $p)
		<tr>

			<td>{{ $p->id }}</td>
			<td>{{ $p->nombre }}</td>
			<td>{{ $p->descripcion }}</td>
			<td>{{ Form::checkbox('permiso[]',$p->id,$p->visible,['class' => 'checkbox1'])}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

<p>
	<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved"></span></button>
	<a href="{{ route('list-user') }}" class="btn btn-default"><span class="glyphicon glyphicon-floppy-remove"></a>
</p>
{{ Form::close() }}

@stop

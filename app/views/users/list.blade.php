@extends('layouts/layout')


@section('content')
<div class="col-xs-12">
	<h2>Listado de Usuarios</h2>

	<div class="dt-toolbar">
		<a href="{{ route('new-user') }}" class="btn btn-default"><span class="glyphicon glyphicon-user"></span></a>
	</div>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>email</th>
				<th>Acciones</th>

			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->full_name}}</td>
				<td>{{$user->email}}</td>
				<td width="50">
					<a href="{{ route('user', [$user->id])}}" class="btn btn-info">Editar</a>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>

</div>
@stop

@section('js')
<script src="{{asset("assets/datatables/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/datatables/js/dataTables.bootstrap.js")}}"></script>
<script src="{{asset("assets/js/componentes.js")}}"></script>
@stop

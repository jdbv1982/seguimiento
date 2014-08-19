@extends('layouts/layout')

@section('content')
<div class="col-xs-12">
	<h2>Listado de Usuarios</h2>
	<div>
		<a href="{{ route('new-user') }}" class="btn btn-default"><span class="glyphicon glyphicon-user"></span></a>
	</div>

	{{Datatable::datatable('example',
		['Id','Nombre','Correo','Acciones'],
		['id','full_name','email'],
		$users,
		'user'
		)}}


</div>
@stop

@section('js')
<script src="{{asset("assets/datatables/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/datatables/js/dataTables.bootstrap.js")}}"></script>
<script src="{{asset("assets/js/componentes.js")}}"></script>
@stop



@extends('layouts/layout')

@section('content')
<div class="col-xs-12">
	<h2>Listado de Sulicitudes</h2>
	<div>
		<a href="{{ route('nueva-solicitud') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></a>
	</div>

	<table id="example" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Plazo</th>
            <th>Status</th>
            <th>Usuario</th>
            <th>instruccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

@foreach ($solicitudes as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->respuesta->nombre}}</td>
        <td>{{$item->state->status}}</td>
        <td>{{$item->user->full_name}}</td>
        <td>{{$item->instruccion}}</td>
        <td class="text-center">hola</td>
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

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
            <th>Fecha D.G</th>
            <th>Dirigido</th>
            <th>Solicitud</th>
            <th>Instruccion</th>
            <th>Plazo</th>
            <th>Residencia</th>
            <th>Status</th>
            <th>Realizo</th>
            <th>Num. Oficio</th>
            <th>Atn Ciudadana</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

@foreach ($solicitudes as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->fecha_direccion}}</td>
        <td>
            @foreach ($item->dirigidos as $dirigido)
                {{$dirigido->departamentos->nombre}}<br>
            @endforeach
        </td>
        <td>{{$item->tipo->clave}}</td>
        <td>{{$item->instruccion}}</td>
        <td>{{$item->respuesta->nombre}}</td>
        <td>{{$item->residencia->nombre}}</td>
        <td>{{$item->state->status}}</td>
        <td>{{$item->user->full_name}}</td>
        <td>{{$item->num_oficio}}</td>
        <td>{{$item->atn_ciudadana_title}}</td>
        <td width="150" class="text-center">
                <a href="{{ route('editar-solicitud', [$item->id])}}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ route('imprimir-solicitud', [$item->id])}}" class="btn btn-default" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
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

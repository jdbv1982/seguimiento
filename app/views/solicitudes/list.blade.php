@extends('layouts/layout')

@section('content')
<div class="col-xs-12">
	<h2>Listado de Sulicitudes</h2>
	<div>
        <a href="{{ route('nueva-solicitud') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></a>
        <a href="#" id="btn_todos" class="btn btn-default btn-list">Todos <span class="badge"></span></a>
        <a href="#" id="btn_pendientes" class="btn btn-info btn-list">Pendientes <span class="badge"></span></a>
        <a href="#" id="btn_en_proceso" class="btn btn-default btn-list">En Proceso <span class="badge"></span></a>
        <a href="#" id="btn_finalizados" class="btn btn-default btn-list">Finalizados <span class="badge"></span></a>
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
        @include('solicitudes/list-partial')
    </tbody>
  </table>


</div>
@stop

@section('js')
{{ HTML::script("assets/datatables/js/jquery.dataTables.min.js") }}
{{ HTML::script("assets/datatables/js/dataTables.bootstrap.js") }}
{{ HTML::script("assets/js/componentes.js") }}
{{ HTML::script("assets/js/listados.js") }}
@stop

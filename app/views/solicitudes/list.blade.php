@extends('layouts/layout')

@section('content')
<div class="col-xs-12">
	<h2>Listado de Solicitudes</h2>
	<div>
        <a href="{{ route('nueva-solicitud') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></a>
        <a href="#" id="btn_todos" class="btn btn-default btn-list">Todos <span class="badge"></span></a>
        <a href="#" id="btn_pendientes" class="btn btn-info btn-list">Pendientes <span class="badge"></span></a>
        <a href="#" id="btn_en_proceso" class="btn btn-default btn-list">En Proceso <span class="badge"></span></a>
        <a href="#" id="btn_finalizados" class="btn btn-default btn-list">Finalizados <span class="badge"></span></a>
	</div>

    <div id="listado">
        @include('solicitudes/list-partial')
    </div>
</div>
@stop

@section('js')
{{ HTML::script("assets/datatables/js/jquery.dataTables.min.js") }}
{{ HTML::script("assets/datatables/js/dataTables.bootstrap.js") }}
{{ HTML::script("assets/js/componentes.js") }}
{{ HTML::script("assets/js/listados.js") }}
@stop



@extends('layouts/layout')

@section('content')
<div class="col-xs-12">
<br/>
	<legend>Reportes de Solicitudes</legend>
	<div class="col-sm-2">
	    <a href="{{ URL::to('reportes/solicitudes') }}" class="reporte">Solicitudes</a>
	</div>
	<div class="col-sm-10">
	    <legend>Filtros</legend>
        <div id="filtros">

        </div>
	</div>

</div>
@stop


@section('js')
    {{ HTML::script("assets/js/reportes.js") }}
@stop
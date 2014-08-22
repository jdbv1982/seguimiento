@extends('layouts/layout')

@section('css')
	{{ HTML::style('assets/css/chosen.min.css') }}
@stop

@section('content')
	<h3>Nueva Solicitud</h3>
	{{Form::open(['route'=>'registrar-solicitud', 'method'=>'POST','role'=>'form'])}}
	<div class="row">
		<div class="col-sm-4 col-lg-2">
			<legend>Dirigido a:</legend>
			{{Form::select('departamento_id[]', $departamentos, null,['class'=>'form-control chosen-select','data-placeholder'=>'Seleccione un departamento','multiple','required'])}}

			{{Field::text('num_oficio')}}

			{{Field::select('tipoSolicitud_id',null,null,$tipos)}}

			{{Field::text('fecha_direccion',null,['class'=>'fecha'])}}

			{{Field::select('residencia',null,null,$departamentos)}}
		</div>
		<div class="col-sm-8 col-lg-10">
			holaaaa
		</div>
	</div>
	<p>
		<br><br><br><br><br>
		{{ Form::submit('Registrar', ['class'=>'btn btn-success']) }}
		{{ HTML::link('solicitudes', 'Cancelar', ['class'=>'btn btn-default']) }}
	</p>
	{{Form::close()}}
@stop

@section('js')
<script src="{{asset("assets/js/solicitud.js")}}"></script>
<script src="{{asset("assets/js/chosen.jquery.min.js")}}"></script>
@stop

@extends('layouts/layout')

@section('css')
	{{ HTML::style('assets/css/chosen.min.css') }}
@stop

@section('content')
	<h3>Nueva Solicitud</h3>

	{{Form::model($solicitud, ['route'=>['update-solicitud', $solicitud->id], 'method'=>'POST','role'=>'form']) }}
	<div class="row">
		<div class="col-sm-4 col-lg-2">
			{{ Form::hidden('nivel', '../', ['id'=>'nivel']) }}
			<legend>Dirigido a:</legend>
			{{Form::label('departamento_id','Departamento')}}
			{{Form::select('departamento_id[]', $departamentos, $deptos,['class'=>'form-control chosen','multiple'])}}
			{{ $errors->first('departamento_id', '<p class="label label-danger">:message</p>' )}}

			{{Field::text('num_oficio')}}

			{{Field::select('tiposolicitud_id',null,null,$tipos)}}

			{{Field::textarea('descripcion_solicitud',null,null,['class'=>'form-control', 'rows'=>'3'])}}

			{{Field::text('fecha_direccion',null,['class'=>'fecha'])}}

			{{Field::select('residencia_id',null,null,$residencias)}}

			{{Field::select('respuesta_id',null,null,$respuestas)}}

			{{Field::checkbox('atn_ciudadana', $solicitud->atn_ciudadana)}}
			{{Field::checkbox('secretaria_tecnica', $solicitud->secretaria_tecnica)}}
		</div>
		<div class="col-sm-8 col-lg-10">
			<legend>Datos Generales</legend>
			<div class="col-sm-3">
				{{Field::select('region_id',null,['class'=>'form-control chosen','id'=>'region_id','required'],$regiones)}}

			</div>
			<div class="col-sm-3">
				{{Field::select('distrito_id',null,['class'=>'form-control chosen','id'=>'distrito_id'],$distritos)}}
			</div>
			<div class="col-sm-3">
				{{Field::select('municipio_id',null,['class'=>'form-control chosen','id'=>'municipio_id'],$municipios)}}
			</div>
			<div class="col-sm-3">
				{{Field::select('localidad_id',null,['class'=>'form-control chosen','id'=>'localidad_id'],$localidades)}}
			</div>
			<div class="col-sm-6">
				{{Field::textarea('instruccion',null,null,['class'=>'form-control', 'rows'=>'3'])}}
			</div>
			<div class="col-sm-6">
				{{Field::textarea('comentario',null,null,['class'=>'form-control', 'rows'=>'3'])}}
			</div>
			<div class="col-sm-12">
				<div class="col-sm-2"><strong>Accion:</strong></div>
				<div class="col-sm-2">{{Field::checkbox('atencion_a', $solicitud->accion->atencion_a)}}</div>
				<div class="col-sm-2">{{Field::checkbox('seguimiento_a', $solicitud->accion->seguimiento_a)}}</div>
				<div class="col-sm-2">{{Field::checkbox('cumplimiento_a', $solicitud->accion->cumplimiento_a)}}</div>
				<div class="col-sm-2">{{Field::checkbox('evaluacion_a', $solicitud->accion->evaluacion_a)}}</div>
			</div>
			<legend>Caracteristicas</legend>
			<row class="col-sm-3">
				<legend>Especifico:</legend>
				{{Field::checkbox('construccion', $solicitud->caracteristica->construccion)}}
				{{Field::checkbox('ampliacion', $solicitud->caracteristica->ampliacion)}}
				{{Field::checkbox('reconstruccion', $solicitud->caracteristica->reconstruccion)}}
				{{Field::checkbox('conservacion', $solicitud->caracteristica->conservacion)}}
				{{Field::checkbox('proyectos', $solicitud->caracteristica->proyectos)}}
				{{Field::checkbox('reunion', $solicitud->caracteristica->reunion)}}
			</row>
			<row class="col-sm-3">
				<legend>Gestion Administrativa</legend>
				{{Field::checkbox('pasivo', $solicitud->caracteristica->pasivo)}}
				{{Field::checkbox('adeudo', $solicitud->caracteristica->adeudo)}}
				{{Field::checkbox('pago', $solicitud->caracteristica->pago)}}
			</row>
			<row class="col-sm-3">
				<legend>Gestion Tecnica</legend>
				{{Field::checkbox('evaluacion', $solicitud->caracteristica->evaluacion)}}
				{{Field::checkbox('validacion', $solicitud->caracteristica->validacion)}}
				{{Field::checkbox('recursos', $solicitud->caracteristica->recursos)}}
				{{Field::checkbox('calidad', $solicitud->caracteristica->calidad)}}
			</row>
			<row class="col-sm-3">
				<legend>Viabilidad Financiera</legend>
				{{Field::checkbox('viabilidad', $solicitud->caracteristica->viabilidad)}}
			</row>
			<div class="col-sm-12">
			{{Field::textarea('observaciones',$solicitud->caracteristica->observaciones,null,['class'=>'form-control', 'rows'=>'3'])}}

			</div>
			<div class="row">
				<legend>C.C.P.</legend>
				<div class="checkbox">
                    <label>
						{{Form::checkbox('ccp',null, $solicitud->ccp) }} Jefe de la Unidad Técnica
                    </label>
				</div>
				<div class="checkbox">
                    <label>{{Form::checkbox('ccp2',null, $solicitud->ccp2) }} Ing. Rafael Galindo Ramirez - Jefe de Unidad de Coordinacion Operativa Zona Norte</label>
				</div>
				<div class="checkbox">
                    <label>{{Form::checkbox('ccp3',null, $solicitud->ccp3) }} Ing. Olegario Soto Cruz - Jefe de Unidad de Coordinacion Operativa Zona Sur</label>
				</div>
				<div class="checkbox">
                    <label>{{Form::checkbox('ccp4',null, $solicitud->ccp4) }} Jefe de la Unidad de seguimiento</label>
				</div>
			</div>


		<p>
		<br>
		{{ Form::submit('Registrar', ['class'=>'btn btn-success']) }}
		{{ HTML::link('solicitudes', 'Cancelar', ['class'=>'btn btn-default']) }}
	</p>
	</div>
	</div>

	{{Form::close()}}

@stop

@section('js')
{{ HTML::script("assets/js/solicitud.js") }}
{{ HTML::script("assets/js/chosen.jquery.min.js") }}
@stop

@extends('layouts/layout')

@section('css')
{{ HTML::style('assets/css/chosen.min.css') }}
@stop

@section('content')
<h3>Nueva Solicitud</h3>

{{Form::open(['route'=>'registrar-solicitud', 'method'=>'POST','role'=>'form'])}}
<div class="row">
    {{ Form::hidden('nivel', '', ['id'=>'nivel']) }}
    <div class="col-sm-4 col-lg-2">
        <legend>Dirigido a:</legend>
        {{Form::label('departamento_id','Departamento')}}
        {{Form::select('departamento_id[]', $departamentos, null,['class'=>'form-control chosen','multiple'])}}
        {{ $errors->first('departamento_id', '<p class="label label-danger">:message</p>' )}}

        {{Field::text('num_oficio')}}

        {{Field::select('tiposolicitud_id',null,null,$tipos)}}

        {{Field::textarea('descripcion_solicitud',null,null,['class'=>'form-control', 'rows'=>'3'])}}

        {{Field::text('fecha_direccion',null,['class'=>'fecha'])}}

        {{Field::select('residencia_id',null,null,$residencias)}}

        {{Field::select('respuesta_id',null,null,$respuestas)}}

        {{Field::checkbox('atn_ciudadana')}}
    </div>
    <div class="col-sm-8 col-lg-10">
        <legend>Datos Generales</legend>
        <div class="col-sm-3">
            {{Field::select('region_id',null,['class'=>'form-control chosen','id'=>'region_id','required'],$regiones)}}

        </div>
        <div class="col-sm-3">
            {{Field::select('distrito_id',null,['class'=>'form-control chosen','id'=>'distrito_id'],['0'=>'Seleccione ... '])}}
        </div>
        <div class="col-sm-3">
            {{Field::select('municipio_id',null,['class'=>'form-control chosen','id'=>'municipio_id'],['0'=>'Seleccione ... '])}}
        </div>
        <div class="col-sm-3">
            {{Field::select('localidad_id',null,['class'=>'form-control chosen','id'=>'localidad_id'],['0'=>'Seleccione ... '])}}
        </div>
        <div class="col-sm-6">
            {{Field::textarea('instruccion',null,null,['class'=>'form-control', 'rows'=>'3'])}}
        </div>
        <div class="col-sm-6">
            {{Field::textarea('comentario',null,null,['class'=>'form-control', 'rows'=>'3'])}}
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2"><strong>Accion:</strong></div>
            <div class="col-sm-2">{{Field::checkbox('atencion_a')}}</div>
            <div class="col-sm-2">{{Field::checkbox('seguimiento_a')}}</div>
            <div class="col-sm-2">{{Field::checkbox('cumplimiento_a')}}</div>
            <div class="col-sm-2">{{Field::checkbox('evaluacion_a')}}</div>
        </div>
        <legend>Caracteristicas</legend>
        <row class="col-sm-3">
            <legend>Especifico:</legend>
            {{Field::checkbox('construccion')}}
            {{Field::checkbox('ampliacion')}}
            {{Field::checkbox('reconstruccion')}}
            {{Field::checkbox('conservacion')}}
            {{Field::checkbox('proyectos')}}
            {{Field::checkbox('reunion')}}
        </row>
        <row class="col-sm-3">
            <legend>Gestion Administrativa</legend>
            {{Field::checkbox('pasivo')}}
            {{Field::checkbox('adeudo')}}
            {{Field::checkbox('pago')}}
        </row>
        <row class="col-sm-3">
            <legend>Gestion Tecnica</legend>
            {{Field::checkbox('evaluacion')}}
            {{Field::checkbox('validacion')}}
            {{Field::checkbox('recursos')}}
            {{Field::checkbox('calidad')}}
        </row>
        <row class="col-sm-3">
            <legend>Viabilidad Financiera</legend>
            {{Field::checkbox('viabilidad')}}
        </row>
        <div class="col-sm-12">
            {{Field::textarea('observaciones',null,null,['class'=>'form-control', 'rows'=>'3'])}}

        </div>
        <div class="row">
            <legend>C.C.P.</legend>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="cpp">
                    Jefe de la unidad Tecnica
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="cpp2">
                    Ing. Rafael Galindo Ramirez - Jefe de Unidad de Coordinacion Operativa Zona Norte
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="cpp3">
                    Ing. Olegario Soto Cruz - Jefe de Unidad de Coordinacion Operativa Zona Sur
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="cpp4">
                    Jefe de la Unidad de seguimiento
                </label>
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

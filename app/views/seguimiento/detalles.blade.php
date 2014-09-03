@extends('layouts/layout')

@section('content')
<br/>
<legend align="left">Seguimiento</legend>
<div class="col-xs-12 col-sm-3">
    <table class="table table-responsive table-bordered table-condensed">
        <tr>
            <td>Folio: </td>
            <td>{{ $solicitud->id }}</td>
        </tr>
        <tr>
            <td>Fecha: </td>
            <td>{{ $solicitud->fecha_direccion }}</td>
        </tr>
        <tr>
            <td>Solicitud: </td>
            <td>{{ $solicitud->tipo->clave }}</td>
        </tr>
        <tr>
            <td>Residencia: </td>
            <td>{{ $solicitud->residencia->nombre }}</td>
        </tr>
        <tr>
            <td>Dirigido A: </td>
            <td>
                @foreach ($solicitud->dirigidos as $dirigido)
                    -> {{$dirigido->departamentos->nombre}}<br>
                @endforeach
            </td>
        </tr>
        <tr>
            <td>Especifico: </td>
            <td>
                {{$solicitud->caracteristica->construccion}}
                {{$solicitud->caracteristica->ampliacion}}
                {{$solicitud->caracteristica->reconstruccion}}
                {{$solicitud->caracteristica->conservacion}}
                {{$solicitud->caracteristica->proyectos}}
                {{$solicitud->caracteristica->reunion}}
            </td>
        </tr>
        <tr>
            <td>Gestion Administrativa: </td>
            <td>
                {{$solicitud->caracteristica->pasivo}}
                {{$solicitud->caracteristica->adeudo}}
                {{$solicitud->caracteristica->pago}}
            </td>
        </tr>
        <tr>
            <td>Gestion Tecnica: </td>
            <td>
                {{$solicitud->caracteristica->evaluacion}}
                {{$solicitud->caracteristica->validacion}}
                {{$solicitud->caracteristica->recursos}}
                {{$solicitud->caracteristica->proyectos}}
                {{$solicitud->caracteristica->reunion}}
                {{$solicitud->caracteristica->calidad}}
            </td>
        </tr>
        <tr>
            <td>Viabilidad: </td>
            <td>{{$solicitud->caracteristica->viabilidad}}</td>
        </tr>
        <tr>
            <td>Respuesta: </td>
            <td>{{$solicitud->respuesta->nombre}}</td>
        </tr>


    </table>
</div>

<div class="col-xs-12 col-sm-9">
    <table class="table table-bordered table-responsive">
        <tr>
            <td>Descripción</td>
            <td>{{$solicitud->descripcion_solicitud}}</td>
        </tr>
        <tr>
            <td>Instrucción</td>
            <td>{{$solicitud->instruccion}}</td>
        </tr>
        <tr>
            <td>Observaciones</td>
            <td>{{$solicitud->caracteristica->observaciones}}</td>
        </tr>
    </table>
    <br/><br/>
</div>

<div class="col-xs-12 col-sm-9">
    <legend>Comentarios</legend>
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="top" title="Agregar Comentario"><span class="glyphicon glyphicon-plus"></span> </button>
    <table class="table table-bordered table-responsive">
        <thead>
        <th>#</th>
        <th>Fecha</th>
        <th>Comentario</th>
        <th>Realizado</th>
        <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($solicitud->seguimientos as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->comentario}}</td>
            <td>{{$item->user->full_name}}</td>
            <td width="10%">
                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#editModal" data-toggle="tooltip" data-placement="top" title="Editar Comentario"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar Comentario"><span class="glyphicon glyphicon-minus"></span></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>





@include('seguimiento/add_comment')
@include('seguimiento/edit_comment')


@stop

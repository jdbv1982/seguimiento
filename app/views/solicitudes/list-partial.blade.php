@foreach ($solicitudes as $item)
<tr>
    <td>{{$item->id}}</td>
    <td>{{$item->fecha_direccion}}</td>
    <td>
        @foreach ($item->dirigidos as $dirigido)
        * {{$dirigido->departamentos->nombre}}<br>
        @endforeach
    </td>
    <td>{{$item->tipo->clave}}</td>
    <td data-toggle="tooltip" data-placement="top" title="{{$item->instruccion}}">{{Str::limit($item->instruccion,100)}}</td>
    <td>{{$item->respuesta->nombre}}</td>
    <td>{{$item->residencia->nombre}}</td>
    <td>{{$item->state->status}}</td>
    <td>{{$item->user->full_name}}</td>
    <td>{{$item->num_oficio}}</td>
    <td>{{$item->atn_ciudadana_title}}</td>
    <td width="150" class="text-center">
        <a href="{{ route('editar-solicitud', [$item->id])}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar Solicitud"><span class="glyphicon glyphicon-pencil"></span></a>
        <a href="{{ route('seguimiento-solicitud', [$item->id])}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar comentario"><span class="glyphicon glyphicon-comment"></span></a>
        <a href="{{ route('imprimir-solicitud', [$item->id])}}" class="btn btn-default" target="_blank" data-toggle="tooltip" data-placement="top" title="Imprimir Solicitud"><span class="glyphicon glyphicon-print"></span></a>
    </td>
</tr>
@endforeach
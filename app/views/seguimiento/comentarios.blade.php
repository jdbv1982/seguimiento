<legend>Comentarios</legend>
<button id="btn-add-comment" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar Comentario"><span class="glyphicon glyphicon-plus"></span> </button>
<table class="table table-bordered table-responsive" id="table-comments">
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
        <td width="13%" class="text-center">
            <a href="#" id="btn-edit-comment" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar Comentario"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="#" id="btn-delete-comment" class="btn btn-danger deleteLink"" data-toggle="tooltip" data-placement="top" title="Eliminar Comentario"><span class="glyphicon glyphicon-minus"></span></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
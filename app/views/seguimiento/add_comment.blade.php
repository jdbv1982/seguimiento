<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::hidden('id',null, ['id'=>'id']) }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Comentario</h4>
            </div>
            <div class="alert alert-danger alert-dismissable alerta oculto">
                <strong>Error!</strong> Corregir los siguientes Errores:.
                <p class="mensage"></p>
            </div>
            <div class="modal-body">
                {{Field::textarea('comentario',null,null,['class'=>'form-control', 'rows'=>'5', 'id'=>'comentario'])}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btn-set-comment" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

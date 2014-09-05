$(document).ready(function(){
    $(document).on('click', '#btn-add-comment', function(){
        addComment($('#myModal'),$("#id"), 0, $("#comentario"), "");

    });

    $(document).on('click', '#btn-edit-comment', function(){
        addComment($('#editModal'),$("#edit-id"), $(this).closest('tr').find('td:eq(0)').text() , $("#edit-comentario"), $(this).closest('tr').find('td:eq(2)').text());
    });

    $(document).on('click','#btn-set-comment', function(){
        setComentario($('#id').val(), $("#peticion-id").val(), $("#comentario").val(),$('#myModal') );
    });

    $(document).on('click','#btn-edit-set-comment', function(){
        setComentario($('#edit-id').val(), $("#peticion-id").val(), $("#edit-comentario").val(), $('#editModal'));
    });

    $(document).on("click", ".deleteLink", function() {
        delComentario($(this).closest('tr'));
    });

});

function addComment(ventana, eleid, id, elecomment, comment){
    ventana.modal('toggle');
    eleid.val(id);
    elecomment.val(comment);
}

function setComentario(id, peticion_id, comentario, ventana){
    $.post('../setComentario',{id:id, peticion_id:peticion_id, comentario:comentario})
        .done(function(data){
        if(data == 'true'){
            ventana.modal('hide');
            getComentarios($("#peticion-id").val(), $("#list-comentarios"));
        }else{
            $('.alerta').css({display:"block"});
            $('.mensage').html("");
            $.each( data, function( key, value ) {
                $('.mensage').append('<h6>'+value+'</h6>');
            });
        }
    });
}

function delComentario(tr){
    var id = tr.find('td:eq(0)').text()
    $.post('../delComentario',{id:id})
        .done(function(data){
            if(data == 'true'){
                tr.css("background-color","#FF3700");

                tr.fadeOut(400, function(){
                    tr.remove();
                });
                return false;
            }
        });
}


function getComentarios(id, sel){
    $.post('../getComentarios',{id:id})
        .done(function(data){
            sel.html("");
            sel.html(data);
        });
}


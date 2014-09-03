$(document).ready(function(){
    btn_select($("#btn_pendientes"), $("#btn_pendientes span"), '=', 1);

    $(document).on('click','#btn_todos', function(){
        btn_select($("#btn_todos"), $("#btn_todos span"), '!=',10);
    });

    $(document).on('click','#btn_pendientes', function(){
        btn_select($("#btn_pendientes"), $("#btn_pendientes span"), '=', 1);
    });

    $(document).on('click','#btn_en_proceso', function(){
        btn_select($("#btn_en_proceso"), $("#btn_en_proceso span"), '=', 3);
    });

    $(document).on('click','#btn_finalizados', function(){
        btn_select($("#btn_finalizados"), $("#btn_finalizados span"), '=', 2);
    });

});

function btn_select(btn, btn_span, regla, valor){
    $(".btn-list").removeClass('btn-info').addClass("btn-default");
    btn.removeClass( "btn-default" ).addClass( "btn-info" );

    $.post('getTotalSolicitudes',{regla: regla, status: valor}, function(data){
        btn_span.html(data);
        if(data > 0){
            $.post('getSolicitudesStatus',{regla: regla, status: valor}, function(data){
               $('#example tbody').html(data);
            });
        }else{
            $('#example tbody').html("<tr class='odd'><td valign='top' colspan='12' class='dataTables_empty'>No hay registros coincidentes encontrados</td></tr>");
        }
    });



    $(".btn-list span").html('');

}
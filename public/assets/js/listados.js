$(document).ready(function(){
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
               $('#example tbody').html('<tr role="row" class="odd"> '+
                   '<td>1</td> '+
                   ' <td class="sorting_1">2014-08-28</td> '+
                    '<td> '+
                * Unidad Juridica<br> '+
                * Direccion de Modulos Micro-Regionales<br> '+
                </td> '+
                    <td>UC</td> '+'
                    <td data-toggle="tooltip" data-placement="top" title="Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, " consecteur",="" en="" un="" pasaje="" de="" lorem="" ipsum,="" y="" al="" seguir="" leyendo="" distintos="" textos="" del="" latín,="" descubrió="" la="" fuente="" indudable.="" ipsum="" viene="" las="" secciones="" 1.10.32="" 1.10.33="" "de="" finnibus="" bonorum="" et="" malorum"="" (los="" extremos="" bien="" el="" mal)="" por="" cicero,="" escrito="" año="" 45="" antes="" cristo.="" este="" libro="" es="" tratado="" teoría="" éticas,="" muy="" popular="" durante="" renacimiento.="" primera="" linea="" "lorem="" dolor="" sit="" amet..",="" una="" sección="" trozo="" texto="" estándar="" usado="" desde="" 1500="" reproducido="" debajo="" para="" aquellos="" interesados.="" finibus="" cicero="" son="" también="" reproducidas="" su="" forma="" original="" exacta,="" acompañadas="" versiones="" inglés="" traducción="" realizada="" 1914="" h.="" rackham."="">Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tie...</td>
                    <td>Urgente</td>
                    <td>RESIDENCIA TEOTITLAN</td>
                    <td>Pendiente</td>
                    <td>Administrador General</td>
                    <td>sfsdfsdf</td>
                    <td>Si</td>
                    <td width="150" class="text-center">
                        <a href="http://localhost/seguimiento/public/editar/1" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="http://localhost/seguimiento/public/impresion/1" class="btn btn-default" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                    </td>
                </tr>')
            });
        }else{
            $('#example tbody').html("<tr class='odd'><td valign='top' colspan='12' class='dataTables_empty'>No hay registros coincidentes encontrados</td></tr>");
        }
    });



    $(".btn-list span").html('');

}
$(document).ready(function() {

	var config = {
		'.chosen'           : {}
	}
	for (var selector in config) {
		$(selector).chosen(config[selector]);
	}

	$('.fecha').datepicker({ dateFormat: "yy-mm-dd",changeMonth: true, changeYear: true });

	$(document).on('change','#region_id',function(){
		rellenaSelect($("#region_id").val(),'distritos','region_id',$('#distrito_id'));
	});

            $(document).on('change','#distrito_id',function(){
                rellenaSelect($("#distrito_id").val(),'municipios','distrito_id',$('#municipio_id'));
            });

            $(document).on('change','#municipio_id',function(){
                rellenaSelect($("#municipio_id").val(),'localidades','municipio_id',$('#localidad_id'));
            });

} );

function rellenaSelect(id, table, campo,sel){
	sel.html("");
	sel.append('<option value="'+0+'">'+'Seleccione ... '+'</option>');
	$.post('getCatalogoAjax',{id: id, table:table, campo:campo}, function(data) {
		$.each( data, function( key, value ) {
            			sel.append('<option value="'+value+'">'+key+'</option>');
		});
		sel.focus().trigger("chosen:updated");
	});
}


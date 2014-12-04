{{ Form::open(array('url'=> array('reportes/imprimir'),'method'=>'POST')) }}

@include('filtros/nombre_reporte')
@include('filtros/year')
@include('filtros/direccion')
@include('filtros/estatus')
@include('filtros/atn_ciudadana')
@include('filtros/secretaria_tecnica')
@include('filtros/residencia')
@include('filtros/region')
@include('filtros/municipio')
@include('filtros/btnenvio')

{{ Form::close() }}


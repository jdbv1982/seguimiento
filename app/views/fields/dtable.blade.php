<table id={{$idTable}} class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
		@for ($i=0; $i < count($headers) ; $i++)
			<th>{{$headers[$i]}}</th>
		@endfor
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $item)
		<tr>
			@for ($i=0; $i < count($names) ; $i++)
				<td>{{$item->$names[$i]}}</td>
			@endfor
			<td width={{$tamaño}} class="text-center">
			@if(isset($routeEdit))
				<a href="{{ route($routeEdit, [$item->$names[0]])}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar informacion"><span class="glyphicon glyphicon-pencil"></span></a>
			@endif
			@if(isset($routePermisos))
				<a href="{{ route($routePermisos, [$item->$names[0]])}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar permisos"><span class="glyphicon glyphicon-list"></span></a>
			@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

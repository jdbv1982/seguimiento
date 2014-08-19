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
			<td width="50">
			@if(isset($routeEdit))
				<a href="{{ route($routeEdit, [$item->$names[0]])}}" class="btn btn-info">Editar</a>
			@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

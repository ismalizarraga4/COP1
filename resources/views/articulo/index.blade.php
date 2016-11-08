@extends('layouts.admin')

@include('alerts.successAlerts');
@section('content')


	<table class="table">
		<thead>
			<th>Descripción</th>
			<th>Modelo</th>
			<th>Precio</th>
			<th>Existencia</th>
			<th>Operacion</th>
		</thead>
		@foreach($articulos as $articulo)
		<tbody>
			<td>{{$articulo->descripcion}}</td>
			<td>{{$articulo->modelo}}</td>
			<td>{{$articulo->precio}}</td>
			<td>{{$articulo->existencia}}</td>
			<td>
				{!!link_to_route('articulo.edit', $title = 'Editar', $parameters = $articulo->id_articulo, $attributes = ['class'=>'btn btn-primary'])!!}
			</td>
		</tbody>
		@endforeach
	</table>
	{!!$articulos->render()!!}
@stop
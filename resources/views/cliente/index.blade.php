@extends('layouts.admin')

@include('alerts.successAlerts');
@section('content')
	
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Apellido P</th>
			<th>Apellido M</th>
			<th>R.F.C.</th>
			<th>Operacion</th>
		</thead>
		@foreach($clientes as $cliente)
		<tbody>
			<td>{{$cliente->nombre}}</td>
			<td>{{$cliente->apellidoP}}</td>
			<td>{{$cliente->apellidoM}}</td>
			<td>{{$cliente->rfc}}</td>
			<td>
				{!!link_to_route('cliente.edit', $title = 'Editar', $parameters = $cliente->id_cliente, $attributes = ['class'=>'btn btn-primary'])!!}
			</td>
		</tbody>
		@endforeach
	</table>
	{!!$clientes->render()!!}
@stop
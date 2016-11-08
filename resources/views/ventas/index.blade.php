@extends('layouts.admin')

@include('alerts.successAlerts');
@section('content')
	
	<table class="table">
		<thead>
			<th>Cantidad</th>
			<th>Fecha</th>
			
		</thead>
		@foreach($ventas as $venta)
		<tbody>
			<td>{{$venta->cantidad_total}}</td>
			<td>{{$venta->fc_venta}}</td>
		</tbody>
		@endforeach
	</table>
	{!!$ventas->render()!!}
@stop
@extends('layouts.admin')

@include('alerts.successAlerts'); 
@section('content')
	<table class="table">
		<thead>
			<th>Tasa Financiamiento</th>
			<th>Enganche</th>
			<th>Plazo Maximo</th>
			<th>Operacion</th>
		</thead>
		@foreach($configuraciones as $configuracion)
		<tbody>
			<td>{{$configuracion->tasa_financiamiento}}</td>
			<td>{{$configuracion->enganche}}</td>
			<td>{{$configuracion->plazo_max}}</td>
			<td>
				{!!link_to_route('configuracion.edit', $title = 'Editar', $parameters = $configuracion->id_conf, $attributes = ['class'=>'btn btn-primary'])!!}
			</td>
		</tbody>
		@endforeach
	</table>
	{!!$configuraciones->render()!!}
@stop

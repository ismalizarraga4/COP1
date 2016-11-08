@extends('layouts.admin')

@section('content')
	@include('alerts.requestAlerts')
	{!!Form::model($configuracion,['route'=>['configuracion.update',$configuracion->id_conf],'method'=>'PUT'])!!}
		@include('configuracion.form.conf')
		{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

	{!!Form::open (['route'=>['configuracion.destroy',$configuracion->id_conf],'method'=>'DELETE'])!!}
		{!!Form::submit('Eliminar ',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}

@stop
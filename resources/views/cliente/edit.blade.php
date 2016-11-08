@extends('layouts.admin')

@section('content')
	@include('alerts.requestAlerts')
	{!!Form::model($cliente,['route'=>['cliente.update',$cliente->id_cliente],'method'=>'PUT'])!!}
		@include('cliente.form.ctl')
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

	{!!Form::open (['route'=>['cliente.destroy',$cliente->id_cliente],'method'=>'DELETE'])!!}
		{!!Form::submit('Eliminar ',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}

@stop
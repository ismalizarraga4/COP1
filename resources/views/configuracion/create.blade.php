@extends('layouts.admin')

@section('content')
	@include('alerts.requestAlerts')
	{!!Form::open(['route'=>'configuracion.store','method'=>'POST'])!!}
		@include('configuracion.form.conf')
		{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

@stop
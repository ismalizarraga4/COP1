@extends('layouts.admin')

@section('content')
	@include('alerts.requestAlerts')
	{!!Form::open(['route'=>'cliente.store','method'=>'POST'])!!}
		@include('cliente.form.ctl')
		{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

@stop
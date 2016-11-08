@extends('layouts.admin')

@section('content')
	@include('alerts.requestAlerts')
	{!!Form::open(['route'=>'articulo.store','method'=>'POST'])!!}
		@include('articulo.form.art')
		{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

@stop
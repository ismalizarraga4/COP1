@extends('layouts.admin')

@section('content')
	@include('alerts.requestAlerts')
	{!!Form::model($articulo,['route'=>['articulo.update',$articulo->id_articulo],'method'=>'PUT'])!!}
		@include('articulo.form.art')
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

	{!!Form::open (['route'=>['articulo.destroy',$articulo->id_articulo],'method'=>'DELETE'])!!}
		{!!Form::submit('Eliminar ',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}

@stop
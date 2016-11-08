<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

	{!!Html::style('styles/styles.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('styles/styles.css')!!}
    {!!Html::style('styles/sweetalert.css')!!}
    {!!Html::style('styles/bootstrap.min.css')!!}
    {!!Html::style('styles/font-awesome.css')!!}
	
	<meta charset="UTF-8">
	<title>COP1</title>
</head>
<body>
	<header>
		<div id="log_princ">
			
		</div>
		<div id="menu_prin">
			<a href="{!!URL::to('/admin')!!}" class="btn btn-primary "> Admin </a>
			<p id="fc_cont">Fecha: <span id="fc_venta"></span></p>
		</div>
	</header>
	<div class="cpo">
		<div class="container-fluid">
			@yield('content')
		</div>
	</div>
	
	{!!Html::script('events/jquery-1.12.3.min.js')!!}
	{!!Html::script('js/bootstrap.min.js')!!}
	{!!Html::script('js/metisMenu.min.js')!!}
	{!!Html::script('js/sb-admin-2.js')!!}

	{!!Html::script('events/sweetalert.min.js')!!}
	{!!Html::script('events/bootstrap.min.js')!!}
	{!!Html::script('events/events.js')!!}

    
</body>
</html>













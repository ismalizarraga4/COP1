<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin cop1</title>
    
    {!!Html::style('styles/styles.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}

</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="btn_ven">
                <a href="{!!URL::to('/')!!}" class="btn btn-primary " style="margin-top:5px;"> Venta </a>
                
            </div>
            <div class="navbar-header">
                
                <a class="navbar-brand" href="index.html">Cop1 Admin</a>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Cliente <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/cliente/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/cliente')!!}"><i class='fa fa-list-ol fa-fw'></i> Clientes </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Articulos <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/articulo/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/articulo')!!}"><i class='fa fa-list-ol fa-fw'></i> Articulos </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i> Configuracion <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/configuracion')!!}"><i class='fa fa-list-ol fa-fw'></i> Configuracion </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{!!URL::to('/ventas')!!}"><i class="fa fa-bar-chart fa-fw"></i> Ventas </a>
                        </li>

                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>
    

    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}

</body>

</html>

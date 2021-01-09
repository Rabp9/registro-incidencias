<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $this->fetch("title"); ?></title>

        <!-- Bootstrap -->
        <?php
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('default');
        ?>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $this->Html->url(array("controller" => "Pages", "action" => "home")); ?>"><?php echo $this->Html->image("logo_tmt_2.png") ?> Sistema Interno de Registro de Incidencias</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation" class="dropdown <?php echo $this->request->params['controller'] == 'Reportes' ? "active" : ""; ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <?php echo $this->requestAction(array("controller" => "Users", "action" => "data"))?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo $this->Html->url(array(
                                        "controller" => "Users",
                                        "action" => "algo"
                                    )); ?>">
                                        <div class="icon icon-cursos icon-medium"></div>
                                        Cambiar Password
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(array(
                                        "controller" => "Reportes",
                                        "action" => "tipo"
                                    )); ?>">
                                        <div class="icon icon-cursos icon-medium"></div>
                                        Estadìsticas de Usuario
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?php echo $this->Html->url(array("controller" => "Users", "action" => "logout")); ?>">Cerrar Sesiòn</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-10">
                    <ul class="nav nav-pills">
                        <li class="<?php echo $this->request->params['controller'] == 'Incidencias' ? "active" : ""; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Incidencias",
                                "action" => "index"
                            )); ?>">
                                <div class="icon icon-matricula icon-medium"></div>
                                Incidencias
                            </a>
                        </li>
                        <li class="<?php echo $this->request->params['controller'] == 'Trabajadores' ? "active" : ""; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Trabajadores",
                                "action" => "index"
                            )); ?>">
                                <div class="icon icon-asistencias icon-medium"></div>
                                Trabajadores
                            </a>
                        </li>
                        <li class="<?php echo $this->request->params['controller'] == 'Cruces' ? "active" : ""; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Cruces",
                                "action" => "index"
                            )); ?>">
                                <div class="icon icon-matricula icon-medium"></div>
                                Cruces Semafóricos
                            </a>
                        </li>
                        <li class="<?php echo $this->request->params['controller'] == 'Componentes' ? "active" : ""; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Componentes",
                                "action" => "index"
                            )); ?>">
                                <div class="icon icon-horario icon-medium"></div>
                                Componentes
                            </a>
                        </li>
                        <li class="<?php echo $this->request->params['controller'] == 'Tipos' ? "active" : ""; ?>">
                            <a href="<?php echo $this->Html->url(array(
                                "controller" => "Tipos",
                                "action" => "index"
                            )); ?>">
                                <div class="icon icon-cursos icon-medium"></div>
                                Tipos de Incidencias
                            </a>
                        </li>
                        <li role="presentation" class="dropdown <?php echo $this->request->params['controller'] == 'Reportes' ? "active" : ""; ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                Reportes <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo $this->Html->url(array(
                                        "controller" => "Reportes",
                                        "action" => "cruce"
                                    )); ?>">
                                        <div class="icon icon-cursos icon-medium"></div>
                                        Reporte por Cruce
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(array(
                                        "controller" => "Reportes",
                                        "action" => "tipo"
                                    )); ?>">
                                        <div class="icon icon-cursos icon-medium"></div>
                                        Reporte por Tipo de Incidencia
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(array(
                                        "controller" => "Reportes",
                                        "action" => "componente"
                                    )); ?>">
                                        <div class="icon icon-cursos icon-medium"></div>
                                        Reporte por Componente
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url(array(
                                        "controller" => "Reportes",
                                        "action" => "estadisticas"
                                    )); ?>">
                                        <div class="icon icon-cursos icon-medium"></div>
                                        Reporte de Estadísticas
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid contenido">
            <div class="row">
                <div class="col-xs-8 dv-cuerpo">
                    <div class="cuerpo" id="contenido-vista">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
                <div class="col-xs-4 dv-lateral">
                    <div class="lateral">
                        <div class="fb-page" data-href="https://www.facebook.com/page.tmt?ref=ts&amp;fref=ts" 
                             data-width="400" data-height="800" 
                             data-small-header="false" data-adapt-container-width="true" 
                             data-hide-cover="false" data-show-facepile="true" 
                             data-show-posts="true">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/page.tmt?ref=ts&amp;fref=ts">
                                    <a href="https://www.facebook.com/page.tmt?ref=ts&amp;fref=ts">
                                        Transportes Metropolitanos de Trujillo - TMT
                                    </a>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container" style="text-align: center;">
                <h4>©2015. Todos los derechos reservados. CCT - Centro de Control de Tráfico</h4>
            </div>
        </nav>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <?php
            echo $this->Html->script("jquery-1.11.1.min");
            echo $this->Html->script("bootstrap.min");
        ?>        
        <?php echo $this->fetch('script'); ?>
	<!-- Js writeBuffer -->
	<?php
            if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
            // Writes cached scripts
	?>
    </body>
</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema Interno de Registro de Incidencias</title>

        <!-- Bootstrap -->
        <?php
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('login');
        ?>
    </head>
    <body>
        <div class="row row-logo">
            <div class="col-xs-6 col-xs-offset-3 titulo-logo">
                <?php echo $this->Html->image("logo_tmt_2.png") ?> Sistema Interno de Registro de Incidencias
            </div>
        </div>
        <div class="row row-pnl-login">
            <div class="col-xs-4 col-xs-offset-4">
                <div class="panel panel-default pnl-login">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <?php 
                            echo $this->Form->create("User", array("action" => "login"));
                            echo $this->Form->input("username", array(
                                "label" => "Username",
                                "div" => "form-group",
                                "class" => "form-control",
                                "placeholder" => "usistema"
                            ));      
                            echo $this->Form->input("password", array(
                                "label" => "Password",
                                "div" => "form-group",
                                "class" => "form-control",
                                "placeholder" => "password"
                            ));
                            echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-log-in")) . " Login", array("class" => "btn btn-default"));
                            echo $this->Form->end();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <?php
            echo $this->Html->script("jquery-1.11.1.min");
            echo $this->Html->script("bootstrap.min");
        ?>        
    </body>
</html>
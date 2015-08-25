<!-- File: /app/View/Reportes/estadisticas.ctp -->
<?php 
    $this->assign("title", "Reportes - Estadísticas");
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>

<h2>Reportes <small>Estadísticas</small></h2>

<?php 
    echo $this->Form->create("Reporte");
    echo $this->Html->para("lead", "Seleccione un intervalo de Fechas:");
    echo $this->Form->input("fechaInicio", array(
        "label" => "Desde",
        "div" => false,
        "class" => "form-control col-md-2",
        "type" => "text"
    ));
    echo $this->Form->input("fechaFin", array(
        "label" => "Hasta",
        "div" => "form-group",
        "class" => "form-control",
        "type" => "text"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-search")) . " Reportar", array("class" => "btn btn-default"));
?>
<div role="tabpanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#cruces" aria-controls="cruces" role="tab" data-toggle="tab">Ranking de Cruces</a></li>
        <li role="presentation"><a href="#tipos" aria-controls="tipos" role="tab" data-toggle="tab">Ranking de Tipos de Incidencias</a></li>
        <li role="presentation"><a href="#componentes" aria-controls="componentes" role="tab" data-toggle="tab">Ranking de Componentes</a></li>
        <li role="presentation"><a href="#trabajadores" aria-controls="trabajadores" role="tab" data-toggle="tab">Ranking de Trabajadores</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="cruces">
            <h3>Ranking de Cruces por Incidencias</h3>
            <?php if(isset($menos)) { ?>
            <h4>Cruces con menos Incidencias</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Cruce</th>
                            <th>Cantidad de Incidencias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menos as $cruce) { ?>
                        <tr>
                            <td><?php echo $cruce["c"]["idCruce"]; ?></td>
                            <td><?php echo $cruce["c"]["descripcion"] ?></td>
                            <td><?php echo $cruce[0]["cantidad"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
            <?php if(isset($mas)) { ?>
            <h4>Cruces con más Incidencias</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Cruce</th>
                            <th>Cantidad de Incidencias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mas as $cruce) { ?>
                        <tr>
                            <td><?php echo $cruce["c"]["idCruce"]; ?></td>
                            <td><?php echo $cruce["c"]["descripcion"] ?></td>
                            <td><?php echo $cruce[0]["cantidad"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tipos">
            <h3>Ranking de Tipos por Incidencias</h3>
            <?php if(isset($tipos)) { ?>
            <h4>Tipos de Incidencias con más ocurrencias</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Cantidad de Incidencias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tipos as $tipo) { ?>
                        <tr>
                            <td><?php echo $tipo["t"]["idTipo"]; ?></td>
                            <td><?php echo $tipo["t"]["descripcion"] ?></td>
                            <td><?php echo $tipo[0]["cantidad"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="componentes">
            <h3>Ranking de Componentes por Incidencias</h3>
            <?php if(isset($tipos)) { ?>
            <h4>Componentes con más Incidencias registradas</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Componente</th>
                            <th>Cantidad de Incidencias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($componentes as $componente) { ?>
                        <tr>
                            <td><?php echo $componente["c"]["idComponente"]; ?></td>
                            <td><?php echo $componente["c"]["descripcion"] ?></td>
                            <td><?php echo $componente[0]["cantidad"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="trabajadores">          
            <h3>Ranking de Trabajadores por Incidencias</h3>
            <?php if(isset($tipos)) { ?>
            <h4>Trabajadores con más Incidencias Registradas</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Trabajador</th>
                            <th>Cantidad de Incidencias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($trabajadores as $trabajador) { ?>
                        <tr>
                            <td><?php echo $trabajador["t"]["idTrabajador"]; ?></td>
                            <td><?php echo $trabajador["t"]["apellidoPaterno"] . " " . $trabajador["t"]["apellidoMaterno"] . ", " . $trabajador["t"]["nombres"]; ?></td>
                            <td><?php echo $trabajador[0]["cantidad"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
    </div>

</div>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#ReporteFechaInicio").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#ReporteFechaFin").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>
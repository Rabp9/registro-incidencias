<!-- File: /app/View/Reportes/tipo.ctp -->
<?php 
    $this->assign("title", "Reportes - Por Tipo de Incidencia");
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>

<h2>Reportes <small>Por Tipo de Incidencia</small></h2>

<?php 
    echo $this->Form->create("Tipo");
    echo $this->Html->para("lead", "Seleccione un Tipo de Incidencia y un intervalo de Fechas:");
    echo $this->Form->input("idTipo", array(
        "label" => "Tipo",
        "div" => "form-group",
        "options" => $tipos,
        "class" => "form-control",
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input("fechaInicio", array(
        "label" => "Desde",
        "div" => "form-group",
        "class" => "form-control",
        "type" => "text"
    ));
    echo $this->Form->input("fechaFin", array(
        "label" => "Hasta",
        "div" => "form-group",
        "class" => "form-control",
        "type" => "text"
    ));
    echo $this->Html->div(null, "", array(
        "id" => "reporte"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-save")) . " Exportar a PDF", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Componentes", array("controller" => "Componentes", "action" => "index"));
?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#TipoFechaInicio").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
        $("#TipoFechaFin").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>

<?php
    $tipos = $this->Js->request(array(
        "controller" => "Reportes",
        "action" => "getByTipo"
    ), array(
        "update" => "#reporte",
        "async" => true,
        "method" => "post",
        "dataExpression" => true,
        "data" => $this->Js->get("#TipoTipoForm")->serializeForm(array(
            "isForm" => true,
            "inline" => true
        ))
    ));

    $this->Js->get("#TipoIdTipo")->event("change", $tipos);
    $this->Js->get("#TipoFechaInicio")->event("change", $tipos);
    $this->Js->get("#TipoFechaFin")->event("change", $tipos);
?>
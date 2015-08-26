<!-- File: /app/View/Reportes/cruce.ctp -->
<?php 
    $this->assign("title", "Reportes - Por Cruce");
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->css("selector");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>

<h2>Reportes <small>Por Cruce</small></h2>

<?php 
    echo $this->Form->create("Cruce");
    echo $this->Html->para("lead", "Seleccione un Cruce y un intervalo de Fechas::");
    echo $this->element("getSelectorCruce", array("model" => "Cruce"));
    echo "Desde ";
    echo $this->Form->input("fechaInicio", array(
        "label" => false,
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
    echo $this->Html->div(null, "", array(
        "id" => "reporte"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-save")) . " Exportar a PDF", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Componentes", array("controller" => "Componentes", "action" => "index"));
?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#CruceFechaInicio").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
        $("#CruceFechaFin").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>

<?php
    $cruces = $this->Js->request(array(
        "controller" => "Reportes",
        "action" => "getByCruce"
    ), array(
        "update" => "#reporte",
        "async" => true,
        "method" => "post",
        "dataExpression" => true,
        "data" => $this->Js->get("#CruceCruceForm")->serializeForm(array(
            "isForm" => true,
            "inline" => true
        ))
    ));

    $this->Js->get("#CruceIdCruce")->event("change", $cruces);
    $this->Js->get("#CruceFechaInicio")->event("change", $cruces);
    $this->Js->get("#CruceFechaFin")->event("change", $cruces);
?>
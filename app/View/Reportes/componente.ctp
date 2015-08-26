<!-- File: /app/View/Reportes/componente.ctp -->
<?php 
    $this->assign("title", "Reportes - Por Componente");
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
?>

<h2>Reportes <small>Por Componente</small></h2>

<?php 
    echo $this->Form->create("Componente");
    echo $this->Html->para("lead", "Seleccione un Componente y un intervalo de Fechas:");
    echo $this->Form->input("idComponente", array(
        "label" => "Componente",
        "div" => "form-group",
        "options" => $componentes,
        "class" => "form-control",
        "empty" => "Seleccioina uno"
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
        $("#ComponenteFechaInicio").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
        $("#ComponenteFechaFin").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>

<?php
    $componentes = $this->Js->request(array(
        "controller" => "Reportes",
        "action" => "getByComponente"
    ), array(
        "update" => "#reporte",
        "async" => true,
        "method" => "post",
        "dataExpression" => true,
        "data" => $this->Js->get("#ComponenteComponenteForm")->serializeForm(array(
            "isForm" => true,
            "inline" => true
        ))
    ));

    $this->Js->get("#ComponenteIdComponente")->event("change", $componentes);
    $this->Js->get("#ComponenteFechaInicio")->event("change", $componentes);
    $this->Js->get("#ComponenteFechaFin")->event("change", $componentes);
?>
<!-- File: /app/View/Incidencias/edit.ctp -->
<?php 
    $this->assign("title", "Incidencias - Editar");
    echo $this->Html->css("jquery-ui.min");
    echo $this->Html->css("jquery-ui.structure.min");
    echo $this->Html->css("jquery-ui.theme.min");
    echo $this->Html->css("selector");
    echo $this->Html->script("jquery-ui.min", array("inline" => false));
    echo $this->Html->script("datepicker-es", array("inline" => false));
    echo $this->Html->script("checkboxes-fix", array("inline" => false));
?>

<h2>Incidencias <small>Editar</small></h2>

<?php 
    echo $this->Form->create("Incidencia");
    echo $this->Html->para("lead", "Ingrese los datos de la Incidencia:");
    echo $this->Form->input("idIncidencia", array("type" => "hidden"));
    echo $this->Form->input("asunto", array(
        "label" => "Asunto",
        "div" => "form-group",
        "autofocus" => "autofocus",
        "class" => "form-control"
    ));
    echo $this->Form->input("fecha", array(
        "label" => "Fecha",
        "div" => "form-group",
        "class" => "form-control",
        "type" => "text"
    ));
    echo $this->Form->input("Trabajador", array(
        "label" => "Responsables",
        "div" => "form-group",
        "multiple" => "checkbox",
        "options" => $trabajadores,
        "class" => "form-control incidencia-checkbox"
    ));
    echo $this->element("getSelectorCruce", array("model" => "Incidencia", "descripcion" => $this->request->data["Cruce"]["descripcion"]));
    echo $this->Form->input("Tipo", array(
        "label" => "Tipo",
        "div" => "form-group",
        "multiple" => "checkbox",
        "options" => $tipos,
        "class" => "form-control incidencia-checkbox"
    ));
    echo $this->Form->input("Componente", array(
        "label" => "Componente",
        "div" => "form-group dv-componentes",
        "multiple" => "checkbox",
        "options" => $componentes,
        "class" => "form-control incidencia-checkbox"
    ));
    echo $this->Form->label("diagnostico", "Diagnóstico");
    echo $this->Form->textarea("diagnostico", array(
        "div" => "form-group",
        "class" => "form-control",
        "rows" => 3
    ));
    echo $this->Form->label("accion", "Acción Correctiva");
    echo $this->Form->textarea("accion", array(
        "div" => "form-group",
        "class" => "form-control",
        "rows" => 4
    ));
    echo $this->Form->label("resultado", "Resultado");
    echo $this->Form->textarea("resultado", array(
        "div" => "form-group",
        "class" => "form-control",
        "rows" => 4
    ));
    echo $this->Form->label("observacion", "Observación");
    echo $this->Form->textarea("observacion", array(
        "div" => "form-group",
        "class" => "form-control",
        "rows" => 4
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Incidencias", array("controller" => "Incidencias", "action" => "index"));
?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {
        $("#IncidenciaFecha").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
<?php echo $this->Html->scriptEnd(); ?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function() {

        $(".dv-componentes div.form-control label").each(function() {
            $.ajax({
                async: false,
                context: this,
                url: "\/registro-incidencias\/Componentes\/getImagenByIdComponente",
                data: {idComponente: $(this).parent().find("input").val()},
                success: function(data) {
                    $(this).attr("data-img", data)
                }
            });
            
            $(this).attr("data-html", "true").attr("data-toggle", "tooltip").attr("data-placement", "right");
            var alt = $(this).text();
            var img = $(this).attr("data-img");
            $(this).attr("data-original-title", "<img alt='" + alt + "' width='180' src='../../img/Componentes/" + img + "' />");
        });
        $('[data-toggle="tooltip"]').tooltip();
        
    });
<?php echo $this->Html->scriptEnd(); ?>
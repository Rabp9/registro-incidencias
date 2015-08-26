<!-- File: /app/View/Tipos/add.ctp -->
<?php 
    $this->assign("title", "Tipos - Nuevo");
?>

<h2>Tipos de Incidencias <small>Nuevo</small></h2>

<?php 
    echo $this->Form->create("Tipo");
    echo $this->Html->para("lead", "Ingrese los datos del Tipo de Incidencia:");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "form-group",
        "autofocus" => "autofocus",
        "class" => "form-control"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Tipos de Incidencias", array("controller" => "Tipos", "action" => "index"));
?>
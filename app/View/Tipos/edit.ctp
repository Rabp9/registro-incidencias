<!-- File: /app/View/Tipos/edit.ctp -->
<?php 
    $this->assign("title", "Tipos - Editar");
?>

<h2>Tipos <small>Editar</small></h2>

<?php 
    echo $this->Form->create("Tipo");
    echo $this->Html->para("lead", "Ingrese los datos del Trabajador:");
    echo $this->Form->input("idTipo", array("type" => "hidden"));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "form-group",
        "class" => "form-control",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Tipos de Incidencias", array("controller" => "Tipos", "action" => "index"));
?>
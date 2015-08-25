<!-- File: /app/View/Cruces/edit.ctp -->
<?php 
    $this->assign("title", "Cruces - Editar");
?>

<h2>Cruces <small>Editar</small></h2>

<?php 
    echo $this->Form->create("Cruce");
    echo $this->Html->para("lead", "Ingrese los datos del Cruce:");
    echo $this->Form->input("idCruce", array("type" => "hidden"));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "form-group",
        "class" => "form-control",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->label("observacion", "Observación");
    echo $this->Form->textarea("observacion", array(
        "div" => "form-group",
        "class" => "form-control"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Cruces", array("controller" => "Cruces", "action" => "index"));
?>
<!-- File: /app/View/Cruces/add.ctp -->
<?php 
    $this->assign("title", "Cruces - Nuevo");
?>

<h2>Cruces <small>Nuevo</small></h2>

<?php 
    echo $this->Form->create("Cruce");
    echo $this->Html->para("lead", "Ingrese los datos del Cruce:");
    echo $this->Form->input("idCruce", array(
        "label" => "Código",
        "type" => "text",
        "div" => "form-group",
        "autofocus" => "autofocus",
        "class" => "form-control"
    ));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "form-group",
        "class" => "form-control"
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
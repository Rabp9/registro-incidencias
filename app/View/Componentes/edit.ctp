<!-- File: /app/View/Componentes/edit.ctp -->
<?php 
    $this->assign("title", "Componentes - Editar");
?>

<h2>Componentes <small>Editar</small></h2>

<?php 
    echo $this->Form->create("Componente", array("type" => "file"));
    echo $this->Html->para("lead", "Ingrese los datos del Componente:");
    echo $this->Form->input("idComponente", array("type" => "hidden"));
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
    echo $this->Form->input("imagen", array(
        "label" => "Imagen",
        "div" => "form-group",
        "class" => "form-control",
        "type" => "file"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Componentes", array("controller" => "Componentes", "action" => "index"));
?>
<!-- File: /app/View/Componentes/view.ctp -->
<?php 
    $this->assign("title", "Componentes - Ver");
?>

<h2>Componentes <small>Ver</small></h2>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $componente["Componente"]["idComponente"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $componente["Componente"]["descripcion"]; ?></dd>
    <dt>Observación</dt>
    <dd><?php echo $componente["Componente"]["observacion"]; ?></dd>
    <dt>Imagen</dt>
    <dd><?php echo is_null($componente["Componente"]["imagen"]) ? "Sin imagen" : $this->Html->image("Componentes/" . $componente["Componente"]["imagen"], array(
          "width" => "400px"
    )); ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Componentes", array("controller" => "Componentes", "action" => "index")); ?>
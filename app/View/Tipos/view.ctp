<!-- File: /app/View/Tipos/view.ctp -->
<?php 
    $this->assign("title", "Tipos de Incidencias - Ver");
?>

<h2>Tipos de Incidencias <small>Ver</small></h2>

<dl class="dl-horizontal">
  <dt>Código</dt>
  <dd><?php echo $tipo["Tipo"]["idTipo"]; ?></dd>
  <dt>Descripción</dt>
  <dd><?php echo $tipo["Tipo"]["descripcion"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Tipos de Incidencias", array("controller" => "Tipos", "action" => "index")); ?>
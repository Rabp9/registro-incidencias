<!-- File: /app/View/Cruces/view.ctp -->
<?php 
    $this->assign("title", "Cruces - Ver");
?>

<h2>Cruces <small>Ver</small></h2>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $cruce["Cruce"]["idCruce"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $cruce["Cruce"]["descripcion"]; ?></dd>
    <dt>Observación</dt>
    <dd><?php echo $cruce["Cruce"]["observacion"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Cruces", array("controller" => "Cruces", "action" => "index")); ?>
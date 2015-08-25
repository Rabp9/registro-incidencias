<!-- File: /app/View/Trabajadores/view.ctp -->
<?php 
    $this->assign("title", "Trabajadores - Ver");
?>

<h2>Trabajadores <small>Ver</small></h2>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $trabajador["Trabajador"]["idTrabajador"]; ?></dd>
    <dt>DNI</dt>
    <dd><?php echo $trabajador["Trabajador"]["dni"]; ?></dd>
    <dt>Nombre Completo</dt>
    <dd><?php echo $trabajador["Trabajador"]["nombreCompleto"]; ?></dd>
    <dt>Cargo</dt>
    <dd><?php echo $trabajador["Trabajador"]["cargo"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Trabajadores", array("controller" => "Trabajadores", "action" => "index")); ?>
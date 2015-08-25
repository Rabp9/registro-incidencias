<?php
    $this->assign("title", "Registro de Incidencias - Home");
?>
    <div class="row">
<?php
if(empty($incidencias)) { ?>
    <div class="col-sm-12 col-md-12">
        <h2>No hay Incidencias registradas aún</h2>
    </div>
<?php } else {
foreach($incidencias as $incidencia) {
    $diagnostico = strlen($incidencia["Incidencia"]["diagnostico"]) > 200 ? substr($incidencia["Incidencia"]["diagnostico"], 0, 200) . "..." : $incidencia["Incidencia"]["diagnostico"];
?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <h2><?php echo $incidencia["Cruce"]["descripcion"]; ?></h2>
        <div id="carousel-example-generic<?php echo $incidencia["Incidencia"]["idIncidencia"]; ?>" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach($incidencia["Componente"] as $k_componente => $componente) { ?>
                <li data-target="#carousel-example-generic<?php echo $incidencia["Incidencia"]["idIncidencia"]; ?>" data-slide-to=<?php echo $k_componente; ?> <?php echo $k_componente == 0 ? "class='active'" : "" ?>></li>
                <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php foreach($incidencia["Componente"] as $k_componente => $componente) { ?>
                <div class="item <?php echo $k_componente == 0 ? "active" : ""; ?>">
                    <?php echo $this->Html->image("Componentes/" . $componente["imagen"], array("alt" => $componente["descripcion"])); ?>
                    <div class="carousel-caption">
                        <?php echo $componente["descripcion"]; ?>
                    </div>
                </div>
                <?php } ?>
            </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic<?php echo $incidencia["Incidencia"]["idIncidencia"]; ?>" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic<?php echo $incidencia["Incidencia"]["idIncidencia"]; ?>" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
      <div class="caption">
        <h3><?php echo $incidencia["Incidencia"]["asunto"]; ?></h3>
        <p><?php echo $diagnostico; ?></p>
        <p><a href="<?php echo $this->Html->url(array("controller" => "Incidencias", "action" => "view", $incidencia["Incidencia"]["idIncidencia"])); ?>" class="btn btn-primary" role="button">Ver detalles</a></p>
      </div>
    </div>
  </div>
<?php } ?>
<?php } ?>
</div>
<!-- File: /app/View/Cruces/get_cruces.ctp -->

<div class="table-responsive selector" id="dv-cruces">
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cruces as $cruce) { ?>
            <tr>
                <td class="tdIdCruce"><?php echo $cruce["Cruce"]["idCruce"]; ?></td>
                <td class="tdDescripcion"><?php echo $cruce["Cruce"]["descripcion"] ?></td>
                <td>
                <?php 
                    echo $this->Form->button(
                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")),
                        array("class" => "btn btn-default seleccionarCruce", "type" => "button")
                    ); 
                ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
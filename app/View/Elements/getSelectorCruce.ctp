<!-- File: /app/View/Elements/getSelectorCruce.ctp -->
<?php
    echo $this->Form->input("idCruce", array(
        "label" => "Cruce",
        "div" => "form-group",
        "class" => "form-control",
        "readonly" => true,
        "type" => "hidden"
    ));
    echo $this->Form->input("descripcion", array(
        "label" => "Cruce",
        "div" => "form-group",
        "class" => "form-control",
        "readonly" => true,
        "data-toggle" => "modal",
        "data-target" => "#mdlBuscarCruce",
    ));
?>

<!-- Modal -->
<div class="modal fade" id="mdlBuscarCruce" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                <h4 class="modal-title">Seleccionar Cruce</h4>
            </div>
            <div class="modal-body">
                <?php
                    echo $this->Form->input("Cruce.busqueda", array(
                        "label" => "Buscar",
                        "div" => "form-group",
                        "class" => "form-control",
                        "type" => "search"
                    ));
                    echo $this->requestAction(array("controller" => "Cruces", "action" => "get_cruces"));
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php
    $this->Js->get("#CruceBusqueda")->event("keyup", 
        $this->Js->request(array(
            "controller" => "Cruces",
            "action" => "get_cruces"
        ), array(
            "update" => "#dv-cruces",
            "async" => true,
            "method" => 'post',
            "dataExpression" => true,
            "data" => $this->Js->serializeForm(array(
                "isForm" => false,
                "inline" => true
            ))
        ))
    );
?>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
    $("body").on("click", ".seleccionarCruce", function() {
        var idCruce = $(this).parent().parent().find(".tdIdCruce").text();
        var descripcion = $(this).parent().parent().find(".tdDescripcion").text();
        $("#<?php echo $model; ?>IdCruce").val(idCruce);      
        $("#<?php echo $model; ?>Descripcion").val(descripcion);
        $("#mdlBuscarCruce").modal('toggle');
        $("#CruceBusqueda").val("");
        <?php
          echo  $this->Js->request(array(
                'controller'=> 'Cruces',
                'action'=> 'get_cruces'
            ), array(
                'update'=> "#dv-cruces",
                'async' => true,
                'method' => 'post',
                'dataExpression'=>true,
                'data'=> $this->Js->serializeForm(array(
                    'isForm' => true,
                    'inline' => true
                ))
            ));
        ?>
    });
<?php $this->Html->scriptEnd(); ?>
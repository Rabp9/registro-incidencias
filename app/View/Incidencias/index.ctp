<!-- File: /app/View/Incidencias/index.ctp -->
<?php 
    $this->assign("title", "Incidencias - Lista");
?>
<h2>Incidencias <small>Lista</small></h2>

<?php
    echo $this->Html->link(
        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-plus")) . " Nueva Incidencia",
        array("controller" => "Incidencias", "action" => "add"), 
        array("class" => "btn btn-primary", "escape" => false)
    );
?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr> 
                <th><?php echo $this->Paginator->sort("idIncidencia", "Código"); ?></th>
                <th><?php echo $this->Paginator->sort("asunto", "Asunto"); ?></th>
                <th><?php echo $this->Paginator->sort("idCruce", "Cruce"); ?></th>
                <th><?php echo $this->Paginator->sort("fecha", "Fecha"); ?></th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($incidencias as $incidencia) { ?>
            <tr>
                <td><?php echo $incidencia["Incidencia"]["idIncidencia"]; ?></td>
                <td><?php echo $incidencia["Incidencia"]["asunto"] ?></td>
                <td><?php echo $incidencia["Cruce"]["descripcion"] ?></td>
                <td><?php echo $incidencia["Incidencia"]["fecha"] ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-th-list"></span> Acción
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-zoom-in")) .
                                        " Ver detalles",
                                        array("controller" => "Incidencias", "action" => "view", $incidencia["Incidencia"]["idIncidencia"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>    
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Incidencias", "action" => "edit", $incidencia["Incidencia"]["idIncidencia"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Incidencias", "action" => "delete", $incidencia["Incidencia"]["idIncidencia"]),
                                        array("confirm" => "¿Estás seguro?", "escape" => false)
                                    );
                                ?>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <nav>
        <ul class="pagination">
    <?php
        echo $this->Paginator->prev(
            "&laquo;", 
            array(
                "tag" => "li",
                "escape" => false,
                "class" => "previous"
            ), 
            null, 
            array('class' => 'previous disabled')
        );
        echo $this->Paginator->numbers(array(
            "tag" => "li",
            "currentClass" => "active",
            "separator" => ""
        ));
        echo $this->Paginator->next(
            "&raquo;", 
            array(
                "tag" => "li",
                "escape" => false,
                "class" => "next"
            ), 
            null, 
            array('class' => 'next disabled')
        );
    ?>
        </ul>
    </nav>
    <p align="right">
        <?php echo $this->Paginator->counter(array(
            'format' => __('{:count} en total.')
        ));?>
    </p>
</div>
<?php
    $this->Js->buffer("$('ul.pagination li.active').wrapInner('<a></a>');");
    $this->Js->buffer("$('ul.pagination li.disabled').wrapInner('<a></a>');");
?>
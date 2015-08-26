<!-- File: /app/View/Trabajadores/index.ctp -->
<?php 
    $this->assign("title", "Trabajadores - Lista");
?>
<h2>Trabajadores <small>Lista</small></h2>

<?php
    echo $this->Html->link(
        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-plus")) . " Nuevo Trabajador",
        array("controller" => "Trabajadores", "action" => "add"), 
        array("class" => "btn btn-primary", "escape" => false)
    );
?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr> 
                <th><?php echo $this->Paginator->sort("idTrabajador", "Código"); ?></th>
                <th><?php echo $this->Paginator->sort("dni", "DNI"); ?></th>
                <th><?php echo $this->Paginator->sort("nombreCompleto", "Nombre Completo"); ?></th>
                <th><?php echo $this->Paginator->sort("cargo", "Cargo"); ?></th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trabajadores as $trabajador) { ?>
            <tr>
                <td><?php echo $trabajador["Trabajador"]["idTrabajador"]; ?></td>
                <td><?php echo $trabajador["Trabajador"]["dni"]; ?></td>
                <td><?php echo $trabajador["Trabajador"]["nombreCompleto"] ?></td>
                <td><?php echo $trabajador["Trabajador"]["cargo"]; ?></td>
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
                                        " Ver",
                                        array("controller" => "Trabajadores", "action" => "view", $trabajador["Trabajador"]["idTrabajador"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Trabajadores", "action" => "edit", $trabajador["Trabajador"]["idTrabajador"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Trabajadores", "action" => "delete", $trabajador["Trabajador"]["idTrabajador"]),
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
<!-- File: /app/View/Componentes/index.ctp -->
<?php 
    $this->assign("title", "Componentes - Lista");
?>
<h2>Componentes <small>Lista</small></h2>

<?php
    echo $this->Html->link(
        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-plus")) . " Nuevo Componente",
        array("controller" => "Componentes", "action" => "add"), 
        array("class" => "btn btn-primary", "escape" => false)
    );
?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort("idComponente", "Código"); ?></th>
                <th><?php echo $this->Paginator->sort("descripcion", "Descripción"); ?></th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($componentes as $componente) { ?>
            <tr>
                <td><?php echo $componente["Componente"]["idComponente"]; ?></td>
                <td><?php echo $componente["Componente"]["descripcion"] ?></td>   
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
                                        array("controller" => "Componentes", "action" => "view", $componente["Componente"]["idComponente"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Componentes", "action" => "edit", $componente["Componente"]["idComponente"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Componentes", "action" => "delete", $componente["Componente"]["idComponente"]),
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
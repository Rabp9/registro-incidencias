<!-- File: /app/View/Incidencias/view.ctp -->
<?php 
    $this->assign("title", "Incidencias - Ver");
    echo $this->Html->css("incidencia.table");
?>

<h2>Incidencias <small>Ver</small></h2>

<table>
    <tr>
        <td class="header">Código</td>
        <td><?php echo $incidencia["Incidencia"]["idIncidencia"]; ?></td>
        <td class="header">Fecha</td>
        <td><?php echo $this->Time->format($incidencia["Incidencia"]["fecha"], "%d/%m/%Y"); ?></td>
    </tr>
    <tr>
        <td class="header">Asunto</td>
        <td colspan="3"><?php echo $incidencia["Incidencia"]["asunto"]; ?></td>
    </tr>
    <tr>
        <td class="header">Cruce</td>
        <td colspan="3"><?php echo $incidencia["Cruce"]["descripcion"]; ?></td>
    </tr>
    <tr>
        <td class="header">Responsables</td>
        <td colspan="3">
            <ul>
                <?php foreach($incidencia["Trabajador"] as $trabajador) {
                    echo "<li>" . $trabajador["nombreCompleto"] . "</li>";
                }?>
            </ul>
        </td>
    </tr
    <tr>
        <td class="header">Tipo de Incidencia</td>
        <td colspan="3">
            <ul>
                <?php foreach($incidencia["Tipo"] as $tipo) {
                    echo "<li>" . $tipo["descripcion"] . "</li>";
                }?>
            </ul>
        </td>
    </tr>
    <tr>
        <td class="header">Componentes</td>
        <td colspan="3">
            <ul>
                <?php foreach($incidencia["Componente"] as $componente) {
                    echo "<li>" . $componente["descripcion"] . "</li>";
                }?>
            </ul>
        </td>
    </tr>
    <tr>
        <td class="header" colspan="4">Diagnóstico</td>
    </tr>
    <tr>
        <td colspan="4"><?php echo $incidencia["Incidencia"]["diagnostico"]; ?></td>
    </tr>
    <tr>
        <td class="header" colspan="4">Acción Correctiva</td>
    </tr>
    <tr>
        <td colspan="4"><?php echo $incidencia["Incidencia"]["accion"]; ?></td>
    </tr>
    <tr>
        <td class="header" colspan="4">Resultado</td>
    </tr>
    <tr>
        <td colspan="4"><?php echo $incidencia["Incidencia"]["resultado"]; ?></td>
    </tr>
    <tr>
        <td class="header" colspan="4">Observaciones</td>
    </tr>
    <tr>
        <td colspan="4"><?php echo $incidencia["Incidencia"]["observacion"]; ?></td>
    </tr>
</table>
<?php echo $this->Html->link("Regresar a Lista Incidencias", array("controller" => "Incidencias", "action" => "index")); ?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Asunto</th>
                <th>Cruce</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($incidencias as $incidencia) { ?>
            <tr>
                <td><?php echo $incidencia["idIncidencia"]; ?></td>
                <td><?php echo $incidencia["asunto"] ?></td>
                <td><?php echo $incidencia["Cruce"]["descripcion"] ?></td>
                <td><?php echo $this->Time->format($incidencia["fecha"], "%d/%m/%Y"); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
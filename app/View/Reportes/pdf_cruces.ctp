<?php
    $pdf->AddPage();
    
    $pdf->AddFont("Georgia");
    $pdf->AddFont("Georgia", "B");
    
    $pdf->SetFont("Georgia", "BU", 14);
    $pdf->title("Reporte por Cruces");
    
    $pdf->ln(43);
    
    $pdf->SetFont("Georgia", "", 11);
    
    $pdf->subtitle("Datos Generales");
    $pdf->ln();
    $pdf->content(array(
        "Fecha: " . date("Y-m-d"),
        "Usuario: " . $user["username"]
    ));    
    
    $pdf->ln();
    
    $pdf->subtitle("Filtro del Reporte");
    $pdf->ln();
    $pdf->content(array(
        "Lista de las Incidencias ocurridas en el Cruce Av. América entre el 2015-05-05 y el 2015-06-06 "
    ));
    $pdf->ln();
    
    $pdf->subtitle("Datos Encontrados (" . sizeof($incidencias) . " incidencias en total)");
    $pdf->ln();
    
    // Máximo las cabeceras pueden sumar 190
    $cabeceras = array(
        array("descripcion" => "Código", "width" => 17), 
        array("descripcion" => "Asunto", "width" => 75), 
        array("descripcion" => "Cruce", "width" => 75), 
        array("descripcion" => "Fecha", "width" => 23)
    );
    $columns = array(
        "idIncidencia", "asunto", "cruce", "fecha"
    );
    $pdf->table($cabeceras, $incidencias, $columns);
    $pdf->Output("Reporte_por Cruces.pdf", "D");
?>
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
        "Usuario: " . "Username"
    ));    
    
    $pdf->ln();
    
    $pdf->subtitle("Filtro del Reporte");
    $pdf->ln();
    $pdf->content(array(
        "Lista de las Incidencias ocurridas en el Cruce Av. América entre el 2015-05-05 y el 2015-06-06 "
    ));
    $pdf->ln();
    
    $pdf->subtitle("Datos Encontrados");
    $pdf->ln();
    // $pdf->table($datos);

    $pdf->Output("Reporte_por Cruces.pdf", "D");
?>
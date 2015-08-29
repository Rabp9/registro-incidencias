<?php
    $pdf->AddPage();
    
    $pdf->SetFont("Times", "", 14);
    $pdf->Cell(55);
    $pdf->Cell(30, 6, utf8_decode($saludo), 0, 0, 'C');
    
    $pdf->Output("Reporte_de_Matriculas.pdf", "D");
?>
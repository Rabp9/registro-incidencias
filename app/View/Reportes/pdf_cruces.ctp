<?php
    
    $fpdf->SetFont("Times", "", 14);
    $fpdf->Cell(55);
    $fpdf->Cell(30, 6, utf8_decode($saludo), 0, 0, 'C');
    
    $fpdf->Output("Reporte_de_Matriculas.pdf", "D");
?>
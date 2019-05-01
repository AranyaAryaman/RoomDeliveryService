<?php

    require('fpdf17/fpdf.php');

    $pdf = new FPDF ('p','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);

    $pdf->Cell(130,5,'CORE-2,IIT GUWAHATI',1,0);
    $pdf->Cell(59,5,'INVOICE',1,1);

    $pdf->Output();

?>

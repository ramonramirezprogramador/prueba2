<?php
require('fpdf186\fpdf.php');

$pdf = new FPDF();//Creamos un objeto
$pdf->AddPage();//Insertamos una pagina
$pdf->SetFont('Arial','B',14);//Configuro tipografia
$pdf->SetTextColor(50,80,90);
$pdf->SetLineWidth(1);
$pdf->SetFillColor(210,100,2);
$pdf->SetDrawColor(200,10,10);
$pdf->Cell(190,40,'Centro de estudios tecnologicos industriales y de servicios no.084');
$pdf->SetFont('Times','B',20);//Configuro tipografia
$pdf->Cell(40,10,utf8_decode('Desarrolla Aplicaciones web con conexion a base de datos'));
$pdf->SetFont('Courier','B',16);//Configuro tipografia
$pdf->Cell(40,10,utf8_decode('Ramon Eduardo Ramirez Beltran'),0,1,'c',true);
$pdf->Output();//Cierro el PDF y lo abro.
?>"../lib/fpdf.php"
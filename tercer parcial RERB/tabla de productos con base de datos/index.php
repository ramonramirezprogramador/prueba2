<?php
include "bd.php";
require('fpdf186\fpdf.php');
$pdf = new FPDF();
$pdf -> AddPage();
$result = $pdo->prepare(query: "SELECT * FROM productos");
$result->execute();
$c11= 10;
$c12= 80;
$c13= 20;
$x= $pdf->GetPageWidth();
$y= $pdf->GetPageHeight();
$pdf->SetFont(family: "Arial",style: "B", size:14);
$pdf->SetMargins(left: 50, top:5, right:50);
$pdf->cell(w:1, h:10, txt:"", border:0, ln:1, align:"C", fill:false,link:"");
$pdf->cell(w:$c11, h:10, txt:"Id", border:0, ln:1, align:"C", fill:false,link:"");
$pdf->cell(w:$c12, h:10, txt:"Nombre", border:0, ln:1, align:"C", fill:false,link:"");
$pdf->cell(w:$c13, h:10, txt:"Precio", border:0, ln:1, align:"C", fill:false,link:"");
$pdf->SetFont(family:"Arial", style:"", size:12);
if($result->rowCount() > 0) {
    while($row = $result->fetch(mode: PDO::FETCH_ASSOC)) {
        $pdf->Cell(w: $c11, h:10, txt: $row["id"],border: 1, ln:0, align: "L", fill: false, link:"");
        $pdf->Cell(w: $c12, h:10, txt: utf8_decode(string: $row["nombre"]), border:1, ln:0, align: "C", fill:false,);
        $pdf->Cell(w:$c13, h:10, txt: "$".$row["precio"], border:1, ln:1, align:"C", fill:false, link:"");
    }
} else {
    $pdf->Cell(w:30, h:100, txt: "No se encontraron resultados.", border:0, ln:1, align:"C", fill:false, link:"");
}
$pdf->SetFont(family: "Arial", style:"", size:15);
$pdf->SetTextColor(r: 0, g:7, b:87);
$pdf->Text(x:$x/3.2, y: $y-10, txt: utf8_decode(string:"Nombre: Ramon Eduardo Ramirez Beltran"));
$pdf -> Output();
?>

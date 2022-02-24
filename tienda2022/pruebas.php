<?php
require("fpdf/fpdf.php");


$objFpdf = new FPDF('L','mm','A4');

$objFpdf->AddPage();

$objFpdf->SetFont("Times","BI",10);

$objFpdf->Image("img/store.png",270,5,25,25,"PNG");

$objFpdf->Cell(40,10,"HOLA ISTVN");
$objFpdf->Cell(40,10,"HOLA ISTVN");
$objFpdf->Cell(40,10,"HOLA ISTVN");

$objFpdf->Cell(40,10,"HOLA ISTVN");
$objFpdf->Cell(40,10,"HOLA ISTVN");
$objFpdf->Cell(40,10,"HOLA ISTVN");

$objFpdf->Ln();//salto de linea

for($i=0;$i<50;$i++){
    $objFpdf->Cell(40,10,"HOLA ISTVN");
    $objFpdf->Ln();
    $objFpdf->Image("img/store.png",270,(5+$i),25,25,"PNG");
}

$objFpdf->Output();
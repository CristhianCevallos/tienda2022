<?php
require("fpdf/fpdf.php");
include("Admin/BDD/conexion.php");

$sql="Select * from productos;";
$result=$conn->query($sql);

$Fpdf = new FPDF('L','mm','A4');
$Fpdf->AddPage();
$Fpdf->SetFont("Arial","B",16);
$Fpdf->Image("img/store.png",270,5,25,25,"PNG");
$Fpdf->Cell(100,10,"REPORTE DE LOS PRODUCTOS");
$Fpdf->Ln();
$Fpdf->Ln();
$Fpdf->Ln();
$Fpdf->SetDrawColor(245, 32, 159);
$Fpdf->Cell(30,10,"Numero",true);
$Fpdf->Cell(65,10,"Nombre",true);
$Fpdf->Cell(150,10,"Detalle",true);
$Fpdf->Cell(20,10,"Precio",true);
$Fpdf->Ln();
//$Fpdf->SetTextColor(220,50,50); para el color de letra
while( $row = $result->fetch_assoc()){
    $Fpdf->Cell(30,10,$row["id"],true);
    $Fpdf->Cell(65,10,$row["nombre"],true);
    $Fpdf->Cell(150,10,$row["detalle"],true);
    $Fpdf->Cell(20,10,$row["precio"],true);
    $Fpdf->Ln();
}

$Fpdf->Output();

<?php

require("fpdf/fpdf.php");
session_start();
include("Admin/BDD/conexion.php");
$Fpdf = new FPDF();
$Fpdf->AddPage();
$Fpdf->SetFont("Arial","B",30);
$Fpdf->Image("img/logo.jpg",170,5,25,25,"JPG");
$Fpdf->SetX(150);
$Fpdf->Sety(15);
$textypos = 5;
$Fpdf->Cell(5,$textypos,"Factura Online");
$Fpdf->Ln();
$Fpdf->Ln();
$Fpdf->Ln();
$Fpdf->SetFont("Arial","I",10);

//$Fpdf->SetTextColor(220,50,50); para el color de letra
$sql="Select * from clientes;";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$Fpdf->SetFont("Arial","B",14);
$Fpdf->Cell(30,10,"Nombre:");
$Fpdf->SetFont("Arial","I",14);
    $Fpdf->Cell(65,10,$row["nombre"]);
    $Fpdf->Ln(5);
    $Fpdf->SetFont("Arial","B",14);
    $Fpdf->Cell(30,10,"Apellido:");
    $Fpdf->SetFont("Arial","I",14);
    $Fpdf->Cell(65,10,$row["apellido"]);
    $Fpdf->Ln(5);
    $Fpdf->Ln(5);
    $Fpdf->SetFont("Arial","B",14);
    $Fpdf->Cell(30,10,"Usuario:");
    $Fpdf->SetFont("Arial","I",14);
    $Fpdf->Cell(65,10,$row["usr"]);
    $Fpdf->Ln(5);
    $Fpdf->SetFont("Arial","B",14);
    $Fpdf->Cell(30,10,"Fecha:");
    $Fpdf->SetFont("Arial","I",14);
    $fechaActual = date('d-m-Y');
    $Fpdf->Cell(65,10,$fechaActual);
    $Fpdf->Ln();
    $Fpdf->Ln();
    
// factura elements
$Fpdf->SetFont("Arial","B",14);
$Fpdf->Cell(40,10,"PRODUCTO",true);
$Fpdf->Cell(90,10,"CANTIDAD",true);
$Fpdf->Cell(25,10,"PRECIO",true);
$Fpdf->Cell(25,10,"IMPORTE",true);
$Fpdf->Ln();
foreach ($_SESSION["CARRITO"] as $elemento) {
    $idp = $elemento["nombre"];
    $cantidad = $elemento["cantidad"];
    $precio = $elemento["precio"];
    $importe = $elemento["importe"];
    
        $Fpdf->Cell(40,10,$idp,true);
        $Fpdf->Cell(90,10,$cantidad,true);
        $Fpdf->Cell(25,10,$precio,true);
        $Fpdf->Cell(25,10,$importe,true);
        $Fpdf->Ln();
    
}

$Fpdf->Ln();
$Fpdf->SetFillColor(224,235,255);
$Fpdf->SetTextColor(0);
$Fpdf->SetFont("Arial","B",16);
$Fpdf->SetDrawColor(89, 154, 184);


//$Fpdf->SetLineWidth(.3);
$subtotal = 0;
        $IVA = 0;
        $aPagar = 0;
        foreach ($_SESSION["CARRITO"] as $elemento) {
            $subtotal += $elemento["importe"];
        }
        $IVA = $subtotal * 0.12;
        $aPagar = $subtotal + $IVA;
        $Fpdf->Cell(110,10,"SUBTOTAL:",true,);
        $Fpdf->Cell(40,10,$subtotal,true,);
        $Fpdf->Ln();
        $Fpdf->Cell(110,10,"IVA",true);
        $Fpdf->Cell(40,10,$IVA,true);
        $Fpdf->Ln();
        $Fpdf->Cell(110,10,"TOTAL",true);
        $Fpdf->Cell(40,10,$aPagar,true);

$Fpdf->Output();


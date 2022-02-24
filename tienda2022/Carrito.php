<?php

include("Admin/BDD/conexion.php");
session_start();
$verificar = true;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Agregar"])) {

    $id = $_POST['id'];

    $sql = "SELECT * FROM productos WHERE id = $id and stock >=3";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    if (!isset($_SESSION["CARRITO"])) {

        $tempCarrito = array(
            "id" => $row["id"],
            "nombre" => $row["nombre"],
            "precio" => $row["precio"],
            "cantidad" => 1,
            "importe" => $row["precio"]
        );
        $_SESSION["CARRITO"][$row["id"]] = $tempCarrito;
    } else {
        foreach ($_SESSION["CARRITO"] as $elemento) {
            if ($elemento["id"] == $id) {
                $_SESSION["CARRITO"][$id]["cantidad"]++;
                $_SESSION["CARRITO"][$id]["importe"] = $_SESSION["CARRITO"][$id]["cantidad"] * $_SESSION["CARRITO"][$id]["precio"];
                $verificar = false;
            }
        }

        if ($verificar) {
            $totalElementos = count($_SESSION["CARRITO"]);
            $tempCarrito = array(
                "id" => $row["id"],
                "nombre" => $row["nombre"],
                "precio" => $row["precio"],
                "cantidad" => 1,
                "importe" => $row["precio"]
            );
            $_SESSION["CARRITO"][$row["id"]] = $tempCarrito;
        }
    }
    //print_r($_SESSION);
    header("location:CarritoVista.php");
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Eliminar"])) {

    $id = $_POST["id"];
    unset($_SESSION["CARRITO"][$id]);
    header("Location:CarritoVista.php");
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Accion"])) {

    $id = $_GET['id'];
    $cantidad = $_GET['cantidad'];
    $_SESSION["CARRITO"][$id]["cantidad"]=$cantidad;
    $_SESSION["CARRITO"][$id]["importe"] = $_SESSION["CARRITO"][$id]["cantidad"] * $_SESSION["CARRITO"][$id]["precio"];
}
foreach ($_SESSION["CARRITO"] as $elemento) {
    print_r($elemento);
    $subtotal += $elemento["importe"];
}
$IVA = $subtotal * 0.12;
$aPagar = $subtotal + $IVA;
echo "Subtotal: $subtotal IVA $IVA APAGAR $aPagar";

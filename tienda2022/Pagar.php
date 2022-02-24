<?php

include("Admin/BDD/conexion.php");
include("Plantillas/Encabezado.php");
session_start();
$verificar = true;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST['usr'];
    $pass = $_POST['pwd'];

    $sql = "select * from clientes where usr ='$user' and pwd = '$pass'; ";

    $res = $conn->query($sql);

    if ($res->num_rows == 1) {
        $row = $res->fetch_assoc();

        $id = $row["id"];
        $subtotal = 0;
        $IVA = 0;
        $aPagar = 0;
        foreach ($_SESSION["CARRITO"] as $elemento) {
            $subtotal += $elemento["importe"];
        }
        $IVA = $subtotal * 0.12;
        $aPagar = $subtotal + $IVA;
        $sql = "insert into factura values(null,CURDATE(),$subtotal,$IVA,$aPagar,$id);";
        $idFac = 0;
        if (!$conn->query($sql)) {
            $verificar = false;
          
        } else {
            $idFac = $conn->insert_id;
        }


        foreach ($_SESSION["CARRITO"] as $elemento) {
            $idp = $elemento['id'];
            $cantidad = $elemento["cantidad"];
            $precio = $elemento['precio'];
            $importe = $elemento['importe'];

            $sql = "insert into detallefactura values (null,$cantidad,$precio,$importe,$idFac,$idp)";
            if (!$conn->query($sql)) {
                $verificar = false;
            }
        }


        if ($verificar) {
            echo "<script>
        alert('Bienvenido,Compra realizada');
        window.location.href= 'factura.php';
        </script>";
        } else {
            echo "<script>
        alert('Bienvenidos, Error');
        
        </script>";
        }
    } else {
        echo "<script>alert('intente nuevamente');</script>";
    }
}

?>
<div class="container">
    <div class="row">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email address</label>
                <input type="text" class="form-control" name="usr" id="exampleInputEmail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">we'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
                <input type="password" class="form-control" name="pwd" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>
    </div>
</div>
<?php

include("PLantillas/Pie.php");

?>
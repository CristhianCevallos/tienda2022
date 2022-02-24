<?php

include("Plantillas/Encabezado.php");
$calcular = 0;
session_start();
$subtotal = 0;
$UVA = 0;
$aPagar = 0;
?>
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>IMPORTE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION["CARRITO"] as $elemento) {

                    //print_r($elemento);
                    echo "<br><br>"; ?>
                    

                    <tr>
                        <td><?php echo $elemento["id"] ?></td>
                        <td><?php echo $elemento["nombre"] ?></td>
                        <td><?php echo $elemento["precio"] ?></td>
                        <td><input type="number" id="cantidad" onchange="actualizarCantidad(<?php echo $elemento['id'] ?>,this.value);" value="<?php echo $elemento["cantidad"] ?>" /></td>
                        <td><?php echo $elemento["importe"] ?></td>
                        <td>
                            <form action="Carrito.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $elemento["id"] ?>">
                                <button type="submit" class="btn btn-danger" name="Eliminar" value="Eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php
                    $subtotal += $elemento["importe"];
                    $calcular += $elemento["importe"];
                }
                $IVA = $subtotal * 0.12;
                $aPagar = $subtotal + $IVA;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" style="text-align: right;">Subtotal: </th>
                    <th style="text-align: right;"><?php echo $subtotal ?></th>
                </tr>
                <tr>
                    <th colspan="4" style="text-align: right;">IVA: </th>
                    <th style="text-align: right;"><?php echo $IVA ?></th>
                </tr>
                <tr>
                    <th colspan="4" style="text-align: right;">A pagar: </th>
                    <th style="text-align: right;"><?php echo $aPagar ?></th>
                    
                </tr>
            </tfoot>
        </table>
        <div class="col-md-9">
        </div>
        <div class="col-md-9">
            <a class="btn btn-success" href="Pagar.php">Pagar</a>
        </div>
        <br>
        <br>
        <br>

        <div class="col-md-9">
            <a class="btn btn-success" href="factura.php">factura</a>
        </div>

        <h6>
            <?php if (empty($_SESSION["CARRITO"])) {
                echo "</br>No hay elementos";
            } ?>
        </h6>

    </div>
</div>
<script>
    function actualizarCantidad(id, cantidad) {
        //let cantidad = document.getElementById("cantidad").value;

        const Http = new XMLHttpRequest();
        const url = "Carrito.php?id=" + id + "&cantidad=" + cantidad + "&Accion=Actualizar";
        Http.open("GET", url, false);
        Http.send();
        location.reload();

    }
</script>

<?php

include("PLantillas/Pie.php");

?>
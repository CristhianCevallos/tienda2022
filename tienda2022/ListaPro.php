<?php

use PhpMyAdmin\Engines\Bdb;

include ("Plantillas/encabezado.php");
include("BDD/conexion.php");

$sql = "Select * from productos;";
$result = $conn->query($sql);

?>


<div class="container">
    <div class="row">


        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>STOCK</th>
                    <th>CATEGORIA</th>
                    <th>FOTO</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td> <?php echo $row["precio"]; ?></td>
                        <td><?php echo $row["stock"]; ?></td>
                        <td><?php echo $row["idCategoria"]; ?></td>
                        <td><?php echo $row["foto"]; ?></td>
                        <td><form action="BDD/productosCRUD.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                            <button type="submit" class="btn btn-danger" name="Enviar" value="Eliminar">Eliminar</button>
                            </form>
                        </td>
                        <td>
                        <form action="Formulario_productos.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                            <button type="submit" class="btn btn-info" name="Actualizar" value="Actualizar">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                $conn->close();
                    ?>
        </tbody>
        </table>
    </div>
</div>
<?php include("Plantillas/pie.php"); ?>
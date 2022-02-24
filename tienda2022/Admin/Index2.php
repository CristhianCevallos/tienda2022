<?php

use PhpMyAdmin\Engines\Bdb;

include("Plantillas/Encabezado.php");
include("BDD/conexion.php");



if(isset($_SESSION['PERMISO'])and $_SESSION['PERMISO']== true){

$sql = "Select * from productos;";
$result = $conn->query($sql);
}else{
echo"
    <script>      
        alert('Inicie sesion para continuar');
        window.location.href= 'Login.php';
        </script>";
       
}

?>


<div class="container">
    <div class="row">


        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th>STOCK</th>
                    <th>PRECIO</th>
                    <th>FOTO</th>
                    <TH> </TH>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["detalle"]; ?></td>
                        <td> <?php echo $row["stock"]; ?></td>
                        <td><?php echo $row["precio"]; ?></td>
                        <td><?php echo $row["foto"]; ?></td>
                        <td><form action="BDD/productosCRUD.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                            <button type="submit" class="btn btn-danger" name="Enviar" value="Eliminar">Eliminar</button>
                            </form>
                        </td>
                        
                        <td>
                        <form action="Formulario.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                            <button type="submit" class="btn btn-danger" name="Actualizar" value="Actualizar">Actualizar</button>
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
<?php include("Plantillas/Pie.php"); ?>
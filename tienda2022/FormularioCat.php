<?php include("Plantillas/Encabezado.php");
include("BDD/conexion.php");

$id = "";
$nombre = "";

// Aqui va la condision de variable de sesion 

if ($_SERVER['REQUEST_METHOD'] === "POST") { // Se especifica que se utilizara el metodo post
    // se actualizan los datos 
    if (isset($_POST) && $_POST["Actualizar"] == "Actualizar") {
        $id = $_POST["id"];
        $sql = "SELECT * FROM categorias WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $id = $row['id'];
        $nombre = $row['nombre'];
    }
}

$sql = "Select * from categorias;";
$result = $conn->query($sql);

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br />
            <div class="card">
                Datos - Categorías

            </div>

            <div class="card-header">
                <br />
                <form method="POST" enctype="multipart/form-data" action="BDD/CategoriasCRUD.php">
                    <!-- Envio de fotografias-->

                    <div class="form-group">


                        <input type="hidden" name="id" value="<?php echo $id; ?>" />

                        <label for="descripcion por nombre">Ingrese sus Nombres</label>
                        <br /> <br />
                        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ingrese el nombre de la Categoria" value="<?php echo $nombre; ?>">
                        <br />
                    </div>


                    <button type="submit" name="Enviar" class="btn btn-primary" value="Guardar">Guardar</button>
                </form>
                <br>  
            </div>
            <br>
            <div class="card">
            
                Lista - Categorías
                
            </div>

            
           
            <div class="card">

                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRE</th>
                            <TH> </TH>
                            <TH> </TH>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["Nombre"]; ?></td>




                                <td>
                                    <form action="BDD/CategoriasCRUD.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                                        <button type="submit" class="btn btn-danger" name="Enviar" value="Eliminar">Eliminar</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="FormularioCat.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
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


    </div>

</div>




<?php include("Plantillas/Pie.php"); ?>
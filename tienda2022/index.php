<?php
include("Plantillas/Encabezado.php");
include("Admin/BDD/conexion.php");

$sql = "SELECT * FROM productos WHERE stock >= 3;";

$result = $conn->query($sql);
?>

<div class="container">
    <div class="row">
        <?php while($row = $result->fetch_assoc()){ ?>
        <div class="col-md-3">
        <div class="card text-left">
          <img class="card-img-top" src="img/<?php echo $row['foto']?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?php echo $row['nombre']?></h4>
            <p class="card-text"><?php echo $row['detalle']?></p>
            <h4 class="card-title"><?php echo $row['precio']?></h4>
            <form action="Carrito.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                <button type="submit" class="btn btn-success" name="Agregar" value="Agregar">Comprar</button>
            </form>
          </div>
        </div>
        </div>
        <?php
        }
        $conn->close();
        ?>
    </div>
</div>
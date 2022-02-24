<?php
include("plantillas/encabezado.php");
include("BDD/conexion.php");
$sql = "Select * from productos;";
$result = $conn->query($sql);
?>

<div class="container">
  <div class="row">
    <?php while ($row = $result->fetch_assoc()) { ?>

      <div class="col-md-3">
        <div class="card text-left">
          <img class="card-img-top" src="../img/<?php echo $row['foto']; ?>" alt="">
          <div class="card-body">
            
            <h4 class="card-title"><?php  echo "Producto: <br/>", $row['nombre']; ?></h4>
            <p class="card-text"><?php echo "Detalle: <br/>", $row['detalle']; ?></p>
            <h3 class="card-title"><?php echo "Stock: <br/>", $row['stock']; ?></h3>
            <h3 class="card-title"><?php echo "Precio: <br/>", $row['precio']; ?></h3>
          </div>
        </div>
      </div>
    <?php
    }
    $conn->close();
    ?>
  </div>
</div>


<?php include("plantillas/pie.php"); ?>
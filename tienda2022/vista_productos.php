<?php
include ("Plantillas/encabezado.php");
include("BDD/conexion.php");
$sql = "Select * from productos;";
$result = $conn->query($sql);
?>

<div class="container">
  <div class="row">
    <?php while ($row = $result->fetch_assoc()) { ?>

      <div class="col-md-3">
        <div class="card text-left">
          <img class="card-img-top" src="../img/productos/<?php echo $row['foto']; ?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?php echo $row['nombre']; ?></h4>
            <p class="card-text"><?php echo $row['precio']; ?></p>
          </div>
        </div>
      </div>
    <?php
    }
    $conn->close();
    ?>
  </div>
</div>


<?php include("Plantillas/pie.php"); ?>
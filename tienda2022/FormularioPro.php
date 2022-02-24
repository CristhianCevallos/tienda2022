<?php 
include ("Plantillas/encabezado.php");
include("BDD/conexion.php");

$id ="";
$nombre ="";
$detalle ="";
$precio ="";
$stock  ="";
$foto ="";
$idCategoria = "";


if($_SERVER['REQUEST_METHOD']==="POST"){

if(isset($_POST)&& $_POST["Actualizar"]=="Actualizar"){
    $id=$_POST["id"];
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $id = $row['id'];
    $nombre = $row['nombre'];
    $detalle = $row['detalle'];
    $precio = $row['precio'];
    $stock = $row['stock'];
    $foto = $row['foto'];
    $idCategoria = $row['idCategoria'];
    }
}
?>

<div  class="container">
<div  class="row"> 
<div  class="col-md-12">
<br/>
<div class="card">
    Datos - Productos
    
</div>
<div class="card-header"> 
<br/>    
<form method="POST" enctype="multipart/form-data" action="BDD/productosCRUD.php"> <!-- Envio de fotografias-->

<div class = "form-group">


<input type="hidden" name="id" value="<?php echo $id; ?>" />

    <label for="descripcion por nombre">Ingrese el nombre del producto</label>
    <br/> <br/>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto"  value="<?php echo $nombre; ?>" >
    <br/>    
</div>

<div class = "form-group">
    <label >Ingrese detalle</label>
    <br/> <br/>
    <input type="text" class="form-control" id="detalle" name="detalle" value="<?php echo $detalle?>"  placeholder="Ingrese detalle">
    <br/>    
</div>


<div class = "form-group">
    <label>Ingrese el precio</label>
    <br/> <br/>
    <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $precio;?>"  placeholder="Ingrese el precio">
    <br/>    
</div>

<div class = "form-group">
    <label >Ingrese el stock</label>
    <br/> <br/>
    <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $stock;?>" placeholder="Ingrese el stock">
    <br/>    
</div>

<div class = "form-group">
    <label>Ingrese la categoria</label>
    <br/> <br/>
    <input type="number" class="form-control" id="idCategoria" name="idCategoria" value="<?php echo $idCategoria;?>"  placeholder="Ingrese la categoria">
    <br/>    
</div>

<div class = "form-group">
    <label>Seleccione una Foto</label>
    <br/> <br/>
    <input type="file" class="form-control" id="foto" name="foto" placeholder="Seleccione un archivo" accept="image/png, image/jpeg"> 
    <br/>    
    <h3> <?php echo $foto;?></h3>
</div>




    <button type="submit" name="Enviar" class="btn btn-primary" value="Guardar">Guardar</button>
    </form>
    
   
</div>
<div class="card-body">

</div>
</div>

</div>

</div>

</div>

<?php include("Plantillas/Pie.php"); ?>
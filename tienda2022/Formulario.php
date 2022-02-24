<?php include ("Plantillas/Encabezado.php");
include("BDD/conexion.php");

$id ="";
$nombre ="";
$descripcion ="";
$stock ="";
$precio  ="";
$foto ="";

if(!isset($_SESSION['PERMISO'])and $_SESSION['PERMISO']== true){

    echo"
    <script>      
        alert('Inicie sesion para continuar');
        window.location.href= 'Login.php';
        </script>";
    
}

if($_SERVER['REQUEST_METHOD']==="POST"){

if(isset($_POST)&& $_POST["Actualizar"]=="Actualizar"){
    $id=$_POST["id"];
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $id = $row['id'];
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $stock = $row['stock'];
    $precio = $row['precio'];
    $foto = $row['foto'];
   
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
<form method="POST" enctype="multipart/form-data" action="BDD/estudianteCRUD.php"> <!-- Envio de fotografias-->

<div class = "form-group">


<input type="hidden" name="id" value="<?php echo $id; ?>" / >

    <label for="descripcion por nombre">Ingrese sus Nombre del Producto</label>
    <br/> <br/>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese sus nombres"  value="<?php echo $nombre; ?>" >
    <br/>    
</div>

<div class = "form-group">
    <label >Ingrese Descripcion</label>
    <br/> <br/>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion?>"  placeholder="Ingrese sus apellidos">
    <br/>    
</div>


<div class = "form-group">
    <label>Ingrese Stock</label>
    <br/> <br/>
    <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $stock;?>"  >
    <br/>    
</div>

<div class = "form-group">
    <label >Ingrese precio</label>
    <br/> <br/>
    <input type="number" class="form-control" step="any" id="precio" name="precio" value="<?php echo $precio;?>" placeholder="Ingrese la descripción">
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
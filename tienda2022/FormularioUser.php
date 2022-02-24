<?php include ("Plantillas/Encabezado.php");
include("BDD/conexion.php");

$id ="";
$nombres ="";
$apellidos ="";
$usuario = "";
$clave = "";

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
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $id = $row['id'];
    $nombres = $row['nombres'];
    $apellidos = $row['apellidos'];
    $usuario = $row['usuario'];
    $clave = $row['clave'];
    }
}
?>

<div  class="container">
<div  class="row"> 
<div  class="col-md-12">
<br/>
<div class="card">
    Datos - Usuarios
    
</div>
<div class="card-header"> 
<br/>    
<form method="POST" enctype="multipart/form-data" action="BDD/usuariosCRUD.php"> <!-- Envio de fotografias-->

<div class = "form-group">


<input type="hidden" name="id" value="<?php echo $id; ?>" / >

    <label for="descripcion por nombre">Ingrese sus Nombres</label>
    <br/> <br/>
    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus nombres"  value="<?php echo $nombres; ?>" >
    <br/>    
</div>

<div class = "form-group">
    <label >Ingrese sus apellidos</label>
    <br/> <br/>
    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos?>"  placeholder="Ingrese sus apellidos">
    <br/>    
</div>


<div class = "form-group">
    <label >Ingrese un usuario</label>
    <br/> <br/>
    <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario?>" placeholder="Ingrese un usuario">
    <br/>    
</div>

<div class = "form-group">
    <label >Ingrese una contraseña</label>
    <br/> <br/>
    <input type="password" class="form-control" id="pwd" name="clave" value="<?php echo $pwd;?>" placeholder="Ingrese una contraseña">
    <br/>    
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
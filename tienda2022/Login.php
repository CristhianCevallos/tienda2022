<?php 

include("Admin/BDD/conexion.php");

session_start();
$_SESSION['PERMISO']=false;


if($_SESSION['PERMISO']===true){ // validacion para que no regrese al login si ya inicio sesion 

    echo "<script>      
        alert('Bienvenido');
        window.location.href= 'index.php';
        </script>";
}


if($_SERVER['REQUEST_METHOD']==="POST"){ // validacion para saber que ingresa por metodo post y realice el sql 

        $user=$_POST["usuario"];
        $pass=$_POST["clave"];
        
        $sql = "SELECT * FROM usuarios WHERE usuario ='$user' and clave='$pass';";
        $res = $conn->query($sql);




   if($res->num_rows == 1){ // compara el registro  // validacion para el ingreso de sesion segun el registro de la base
 
    $row = $res->fetch_assoc();
    $_SESSION['PERMISO']=true;
    $_SESSION['NOMBRES']=$row['nombres'];
    $_SESSION['APELLIDOS']=$row['apellidos'];

    echo "<script>      
        alert('Bienvenido');
        window.location.href= 'Index.php';
        </script>";


    }else{
       
        echo "<script>
        
        alert('Datos Incorrectos');
        
        </script>";
       

    }  


}

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/estilos.css" />

    <script src="../js/bootstrap.bundle.js"></script>

</head>

<body>

<div  class="container">
<div  class="row"> 
<div  class="col-md-12">
<br>
<div class="card">
<div class="card-header"> 
    
<form method="POST">
    <div class = "form-group">
    <label for="exampleInputEmail1">Ingrese su Usuario</label>
    <br/> <br/>
    <input type="text" class="form-control" id="usr" name="usuario"  placeholder="Ingrese su usuario">
    <br/>    
</div>
    <div class="form-group">
    <label for="exampleInputPassword1">Ingrese su clave</label>
    <br/><br/>
    <input type="password" class="form-control" id="pwd" name="clave" placeholder="Ingrese su clave">
    <br/>    
</div>
    <button type="submit" name="enviar" class="btn btn-primary" value="enviar">Enviar</button>
    </form>
    
    
</div>
<div class="card-body">

</div>
</div>

</div>

</div>

</div>

</body>

</html>
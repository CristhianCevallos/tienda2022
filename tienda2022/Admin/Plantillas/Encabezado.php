<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/estilos.css" />

    <script src="../js/bootstrap.bundle.js"></script>

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <a class="navbar-brand" href="#"> ADMINISTRADOR </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                <li class="nav-item active">
                    <a class="nav-link" href="Index.php">ISTVN <span class="sr-only"></span></a>
                </li>
             


<!-- Usuarios -->
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle  " data-bs-toggle="dropdown" aria-expanded="false">
    Usuarios
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="FormularioUser.php">Nuevo Usuario</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="ListaUser.php">Lista de Usuarios</a></li>
 
  </ul>
</div>

<!-- Categoria -->
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle  " data-bs-toggle="dropdown" aria-expanded="false">
    Categorías
  </button>
  <ul class="dropdown-menu">
  <li><a class="dropdown-item" href="FormularioCat.php">Nueva Categoría</a></li>


  </ul> 
</div>


<!-- Productos -->
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle  " data-bs-toggle="dropdown" aria-expanded="false">
    Productos
  </button>
  <ul class="dropdown-menu">
  <li><a class="dropdown-item" href="FormularioPro.php">Nuevo Producto</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="ListaPro.php">Lista de Productos</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="VistaProductos.php">Vista Productos</a></li>
  </ul>
</div>





            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link" href="Salir.php">SALIR</a>
                </li>
            
           

            </ul>

        </nav>
    </div>


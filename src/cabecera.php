<?php 
session_start();
if( isset($_SESSION['usuario']) != "idanielmatt"){
    header("location:login.php");
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mountain Panama</title>
    <link rel="stylesheet" href="./output.css">    
</head>
<body>
    <nav class="flex flex-row items-center justify-evenly h-12  bg-green-800 ">
        <ul class="flex flex-row w-96 items-center text-white">
            <li> <img src="../logo/mountain_panama-removebg-preview.png" width="30px" alt="mountain Panama"></li>
            <li> <h1 class="text-lg font-bold mx-8" >Mountain Panama</h1></li>
        </ul>
        <ul class="flex flex-row justify-between w-96  font-bold text-white" >
            <li><a href="index.php">Catálogo</a></li>
            <li><a href="catalogo.php">Vender</a></li>
            <li><a href="mostrarCarrito.php">Carrito (
                <?php 
                    echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); 
                ?> )</a></li>
            <li><a href="cerrar.php">Cerrar </a></li>
        </ul>
    </nav>
<?php include("pie.php"); ?>

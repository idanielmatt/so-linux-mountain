<?php include("conexion.php"); ?>

<?php 
session_start();

$con = new Conexion();
$usuarios = $con->consultar("SELECT * FROM `usuarios`");

if($_POST){
    $user = $_POST['usuario1'];
    $passw = $_POST['contrasena1'];

    foreach($usuarios as $usuario){
        if($usuario['usuario'] == $user){
            if($usuario['contrasena'] == $passw){
                $_SESSION['usuario'] = $user;
                header("location:catalogo.php");
            }else{
                echo "<script> alert ('contraseña incorrecta'); </script> ";
            }
        }else{
            echo "<script> alert ('usuario o contraseña incorrectos'); </script> ";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
                    <br><br><br><br>
                    <div class="card">
                        <div class="card-header">
                            Iniciar Sesión
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                Usuario <input class="form-control" type="text" name="usuario1" autocomplete="off"> <br> 
                            
                                Contraseña <input class="form-control" type="password" name="contrasena1" autocomplete="off"> <br>
                            
                                <button class="btn btn-success" type="submit">Entrar</button>
                             </form>
                        </div>
                        <div class="card-footer text-muted">
                            ¿No tienes cuenta? <span><a href="signup.php">Crea tu cuenta</a></span>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                
            </div>
           
        </div>
        
    </div>
</body>
</html>
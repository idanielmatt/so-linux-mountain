<?php include("conexion.php"); ?>

<?php

if ($_POST) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];


    $con = new Conexion();
    $sql = "INSERT INTO `usuarios` (`nombre`, `apellido`, `correo`, `usuario`, `contrasena`) VALUES ('$nombre', '$apellido', '$correo', '$usuario', '$contrasena');";
    $con->ejecutar($sql);

    header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        Crear Cuenta
                    </div>
                    <div class="card-body">
                        <form action="signup.php" method="post">
                            Nombre <input class="form-control" type="text" name="nombre" autocomplete="off"> <br>
                            Apellido <input class="form-control" type="text" name="apellido" autocomplete="off"> <br>
                            Correo <input class="form-control" type="email" name="correo" maxlength="50"
                                autocomplete="off"> <br>

                            Usuario <input class="form-control" type="text" name="usuario" maxlength="25"
                                autocomplete="off"> <br>
                            Contraseña <input class="form-control" type="password" name="contrasena" maxlength="25"
                                autocomplete="off"> <br>

                            <button class="btn btn-success" type="submit">Entrar</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        ¿Tienes cuenta? <span><a href="login.php">Inicia sesión</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>

    </div>
</body>

</html>
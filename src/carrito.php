<?php 
session_start();
$mensaje = "";

if(isset($_POST['btn_agregar'])){
    switch($_POST['btn_agregar']){
       
        case 'agregar':

            if(is_numeric(openssl_decrypt( $_POST['id'], COD, KEY))){
                $id = openssl_decrypt( $_POST['id'], COD, KEY);
                $mensaje.= "ok, ID correcto " . $id . "<br>";

            }else{
                $mensaje.= "ID incorrecto " . "<br>"; break;
            }

                if(is_string(openssl_decrypt( $_POST['nombre'], COD, KEY))){
                    $nombre = openssl_decrypt( $_POST['nombre'], COD, KEY);
                    $mensaje.= "ok, ID correcto " . $nombre . "<br>";

                }else{
                    $mensaje.= "nombre incorrecto " . "<br>"; break;
                }

                if(is_string(openssl_decrypt( $_POST['descripcion'], COD, KEY))){
                    $descripcion = openssl_decrypt( $_POST['descripcion'], COD, KEY);
                    $mensaje.= "ok, descripcion correcto " . $descripcion . "<br>";

                }else{
                    $mensaje.= "descripcion incorrecto " . "<br>"; break;
                }

                if(is_numeric(openssl_decrypt( $_POST['precio'], COD, KEY))){
                    $precio = openssl_decrypt( $_POST['precio'], COD, KEY);
                    $mensaje.= "ok, precio correcto " . $precio . "<br>";

                }else{
                    $mensaje.= "precio incorrecto " . "<br>"; break;
                }

                if(is_numeric(openssl_decrypt( $_POST['stock'], COD, KEY))){
                    $stock = openssl_decrypt( $_POST['stock'], COD, KEY);
                    $mensaje.= "ok, stock correcto " . $stock . "<br>";

                }else{
                    $mensaje.= "stock incorrecto " . "<br>"; break;
                }

            if(!isset($_SESSION['CARRITO'])){
                $productoArray = array(
                    'ID' => $id,
                    'NOMBRE' => $nombre,
                    'DESCRIPCION' => $descripcion,
                    'PRECIO' => $precio,
                    'STOCK' => $stock,
                );
                $_SESSION['CARRITO'][0] = $productoArray;
                $mensaje = "producto agregado al carrito";

            }else{
                $idProductos = array_column($_SESSION['CARRITO'], "ID");

                if(in_array($id, $idProductos)){
                    echo "<script>alert('Productos seleccionado')</script>";
                }else{

                        
                    $numeroProductos = count($_SESSION['CARRITO']);
                    $productoArray = array(
                        'ID' => $id,
                        'NOMBRE' => $nombre,
                        'DESCRIPCION' => $descripcion,
                        'PRECIO' => $precio,
                        'STOCK' => $stock,
                    );
                    $_SESSION['CARRITO'][$numeroProductos] = $productoArray;
                    $mensaje = "producto agregado al carrito";
                }
                
            }
            
            
            header("location:index.php");

        break;

        case "eliminar":
                if(is_numeric((openssl_decrypt( $_POST['id'], COD, KEY)))){
                    $id = openssl_decrypt($_POST['id'], COD, KEY);

                    foreach($_SESSION['CARRITO'] as $indice => $productoArray){
                        if($productoArray['ID'] == $id){
                            unset($_SESSION['CARRITO'][$indice]);
                        }

                    }
                }else{
                    $mensaje.= "ID incorrecto";
                }
            break;

        default;
    }
}

?>
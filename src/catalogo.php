<?php include("cabecera.php"); ?>
<?php include("conexion.php");?>
<?php 
if($_POST){
    $nombre = $_POST['productName'];
    $descripcion = $_POST['productDesc'];

    $fecha = new DateTime();
    $file = $fecha->getTimestamp(). "_" . $_FILES['productFile']['name'];
    $img_temporal = $_FILES['productFile']['tmp_name'];
    move_uploaded_file($img_temporal, __DIR__."\productos/" . $file);
    
    $precio = $_POST['productPrice'];
    $stock = $_POST['stock'];

    $con = new Conexion();
    $sql = "INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `stock`) 
    VALUES (NULL, '$nombre', '$descripcion', '$file', '$precio', '$stock');";
    $con -> ejecutar($sql);

    header("location:catalogo.php");
}

$con = new Conexion();
$prodcutos = $con->consultar("SELECT * FROM `productos`");

?>
        <div class="bg-blue-200 w-full h-fit flex flex-col justify-around items-center">
            <div class="w-8/12 h-fit rounded-xl bg-gray-50 mt-4 shadow">
                <h1 class="font-semibold text-center py-3 "> Crear un producto </h1>
                <!-- formulario -->
                <form class="p-4 -mb-4 rounded-b-xl text-gray-800 font-semibold  bg-blue-400 " action="catalogo.php" method="post" enctype="multipart/form-data">
                    Nombre del Producto
                    <input  class="mb-4 w-full border border-white px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500" type="text"    name="productName" required autocomplete="off"><br>
                    
                    Foto del Producto
                    <input class="mb-4 w-full border border-white px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 bg-blue-100" type="file"    name="productFile" required autocomplete="off"> <br>
                    
                    Precio
                    <input class="mb-4 w-full border border-white px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500" type="number" step="any" name="productPrice" required> <br>
                    
                    Descripción: marca, talla, género        
                    <textarea  class="w-full border border-white px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500"  type="text" name="productDesc" rows="1" cols="1" maxlength="82" required autocomplete="off"> </textarea> <br>

                    Stock:
                    <input placeholder="max 10"  class="w-full border border-white px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500" type="number" step="1" min="0" max="10" required="required" name="stock" autocomplete="off">

                    <div class="flex flex-row justify-center">
                        <input class=" my-4 py-2 px-10 rounded-xl bg-blue-600 text-white font-semibold hover:cursor-pointer focus:ring focus:ring-blue-900" type="submit" value="publicar">
                    </div>
                </form>
            </div>
            <br><br>
            <div class="w-8/12 h-fit p-5  mb-4" id="table">
                <!-- tabla de productos -->
                <div class="overflow-auto rounded-lg shadow hidden md:block">
                    <table class="w-full"> 
                    <caption class="bg-blue-300 font-semibold text-left p-4"> Productos del Catálogo </caption>
                        <thead class="border-b-2">
                            <tr class="bg-blue-300">
                                <!-- titulos -->
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">ID</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">Nombre</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">Descripción</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">Precio</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php foreach($prodcutos as $producto) { ?>
                                    <tr class="bg-white shadow">
                                        <!-- filas -->
                                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap font-extrabold">
                                            <?php echo $producto['id']; ?>
                                        </td>
                                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                            <?php echo $producto['nombre']; ?>
                                        </td>
                                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                            <?php echo $producto['descripcion']; ?>
                                        </td>
                                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap font-extrabold">
                                            <?php echo "$" . $producto['precio']; ?>
                                        </td>
                                    </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
                    <?php foreach($prodcutos as $producto) { ?>
                        <div class="bg-white  space-y-3 p-4 rounded-lg shadow">
                            <div class="flex justify-between items-center space-x-2 text-sm text-gray-700">
                                <div class="font-semibold"><?php echo $producto['id']; ?></div>
                                <div><?php echo $producto['nombre']; ?></div>
                                <div><?php echo $producto['descripcion']; ?></div>
                                <div class="font-semibold"><?php echo "$". $producto['precio']; ?></div>
                            </div>
                        </div>
                    <?php }?>
                    
                </div>
            </div>
        </div>
<?php include("pie.php"); ?>
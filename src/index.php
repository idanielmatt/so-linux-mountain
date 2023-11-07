<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php include("config.php"); ?>
<?php include("carrito.php"); ?>
<?php 

$con = new Conexion();
$productos = $con->consultar("SELECT * FROM `productos`");

?>



    <!-- imagen presentacion -->
        <div class="p-10 min-h-screen flex items-center justify-center bg-teal-200">
        <!-- background opacity -->
            <div class="w-full h-full  absolute">
                <img class="absolute inset-0 h-full w-full object-cover" src="../logo/camping_ft.jpg" alt="Mountian Panama">
                <div class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
                <div class="flex h-full items-center justify-center relative">
                    <h1 class="pr-36 font-semibold text-5xl text-center text-white leading-relaxed">
                        Bienvenido a Mountain Panama
                        <br>¡Compramos y Acampamos!
                    </h1>
                    
                </div>
            </div>
        </div>
        <br><br>
        <!-- botones de inicio y crear -->

        <div class="flex items-center justify-center min-h-screen container mx-auto">
            <!--grid-->
            <div class="grid grid-cols-1 gap-4 md:grid-flow-col-2 lg:grid-cols-3">
                <?php foreach($productos as $producto) { ?>
                    <!-- card -->
                    <div class="flex flex-col justify-between rounded-xl shadow-lg">
                        <div class="p-5 flex flex-col">
                            <div class="rounded-xl overflow-hidden flex flex-row justify-center">
                                <img class="w-1/2 aspect-3/5 object-contain" src="productos/<?php echo $producto['imagen'] ?>" alt="foto">
                            </div>
                            <div class="flex flex-row items-center justify-between m-2 p-2">
                                <h1 class="text-2xl md:text-3xl font-medium "><?php echo $producto['nombre']; ?></h1>
                                <p class="text-white font-semibold bg-slate-900 w-fit px-2 rounded-md"><?php echo "$" . $producto['precio']; ?></p>
                            </div>
                            <p class="text-slate-500 text-lg mt-3 h-14 "><?php echo $producto['descripcion'] ?></p>
                            <div class="flex justify-between items-center">
                                <p class="text-xs font-bold px-2 h-5  rounded-lg bg-gray-600 w-fit  text-white"><?php echo $producto['stock']; ?> en stock</p>

                                <form class="text-sm" action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt( $producto['id'], COD, KEY); ?>">
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt( $producto['nombre'], COD, KEY); ?>">
                                    <input type="hidden" name="descripcion" id="descripcion" value="<?php echo openssl_encrypt($producto['descripcion'], COD, KEY); ?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt( $producto['precio'], COD, KEY); ?>">
                                    <input type="hidden" name="stock" id="stock" value="<?php echo openssl_encrypt( $producto['stock'], COD, KEY); ?>">


                                    <button type="submit" name="btn_agregar" value="agregar" class="my-2 p-2 rounded-xl  w-fit text-sm font-bold bg-blue-500 text-white hover:cursor-pointer focus:ring focus:ring-blue-900">
                                        agregar al carrito </button> 
                                </form>

                            </div>
                        </div>
                    </div>
                <?php }?>
            
            </div>
            <!-- end grid -->
        </div>

       <br> <br>
    </div>

<?php include("pie.php"); ?>

<!--  -->
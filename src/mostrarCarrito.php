<?php 
include("config.php");
include("cabecera.php");
include("carrito.php");
?>
<?php 

if(!empty($_SESSION['CARRITO'])){ ?>

<div class="container mx-auto p-4">
    <table class="min-w-full border border-gray-300 bg-blue-200">
      <caption class="bg-blue-400 p-2 text-lg font-semibold rounded-t-lg">Carrito de productos</caption>
      <thead>
        <tr>
          <th class="border-b border-gray-300 p-2 text-left">Nombre</th>
          <th class="border-b border-gray-300 p-2 text-left">Precio</th>
          <th class="border-b border-gray-300 p-2 text-left">Descripción</th>
          <th class="border-b border-gray-300 p-2 text-left">Cantidad</th>
          <th class="border-b border-gray-300 p-2 text-center">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $total = 0;
          foreach ($_SESSION['CARRITO'] as $indice=>$productoArray) {
        ?>
        <tr>
          <td class="border-b border-gray-300 p-2"><?php echo $productoArray['NOMBRE']; ?></td>
          <td class="border-b border-gray-300 p-2">$<?php echo $productoArray['PRECIO']; ?></td>
          <td class="border-b border-gray-300 p-2 "><?php echo $productoArray['DESCRIPCION']; ?></td>
          <td class="border-b border-gray-300 p-2 "><?php echo $productoArray['STOCK']; ?></td>
          <td class="border-b border-gray-300 p-2 "> <input class="w-10" type="number" step="1" minlength="1" maxlength="<?php echo $productoArray['STOCK']; ?>"></td>
          
          <td class="border-b border-gray-300 p-2 flex justify-center">
            <form action="" method="post">
              <input type="hidden" name="id" value="<?php echo openssl_encrypt( $productoArray['ID'], COD, KEY); ?>">
              <button name="btn_agregar" value="eliminar" type="submit" class="rounded-xl bg-red-500 p-2 text-white font-semibold">eliminar</button>
            </form>
          </td>
        </tr>
        <?php $total = $total +  ($productoArray['PRECIO'] * $productoArray['STOCK']);?>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr class="rounded-b-lg">
          <td class="p-2 font-bold" colspan="3">Total a pagar: $<?php echo number_format($total, 2); ?></td>
        </tr>
      </tfoot>
    </table>

    <form action="./services/generateReceipt.php">
        <button class="px-3 py-2 border rounded-full" type="submit">Generar recibo</button>
    </form>
  </div>
<?php } else {?>
    <div class="w-fit bg-blue-200 text-gray-900 text-4xl text-center my-10 mx-auto p-6 rounded-xl  flex justify-center items-center">
    <p class="flex items-center leading-relaxed">
      ¡No tienes productos <br> en el carrito! <br>
    </p>
    <img src="../logo/carrito_vacio.png" width="200px" alt="carrito carrito_vacio">
  </div>
<?php } ?>
<?php include("pie.php"); ?>
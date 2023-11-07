<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "";
$products = isset($_SESSION["CARRITO"]) ? $_SESSION["CARRITO"] : [];
$total = 0;

// The current date (taken as the date where it was bought).
$date = date("d/m/Y");

// Calculate the total amount paid.
foreach ($products as $product) {
    $total += $product['STOCK'] * $product['PRECIO'];
}
?>

<page>
    <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 33%"></td>
                <td style="text-align: center; width: 34%">Mountain Panama</td>
                <td style="text-align: right; width: 33%"><?php echo $date ?></td>
            </tr>
        </table>
    </page_header>

    <table style="margin-top: 60px; width: 100%;">
        <thead>
            <tr>
                <th style="width: 40%; text-overflow: ellipsis;">Nombre</th>
                <th style="width: 10%">Precio</th>
                <th style="width: 40%; text-overflow: ellipsis;">Descripción</th>
                <th style="width: 10%">Cantidad</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($products as $product) { ?>
                <tr>
                    <td><?php echo $product['NOMBRE']; ?></td>
                    <td><?php echo $product['PRECIO']; ?></td>
                    <td><?php echo $product['DESCRIPCION']; ?></td>
                    <td><?php echo $product['STOCK']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <table style="margin-top: 40px; margin-left: 60%; width: 40%;">
        <thead>
            <tr>
                <th style="width: 60%">Cliente</th>
                <th style="width: 40%">Total</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="text-align: right;"><?php echo $user ?></td>
                <td class="text-align: right;"><?php echo number_format($total, 2); ?></td>
            </tr>
        </tbody>
    </table>
</page>
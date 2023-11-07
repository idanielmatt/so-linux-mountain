<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

ob_start();
session_start();
include __DIR__ . "/../templates/receipt.php";
$content = ob_get_clean();

try {
    $html2pdf = new Html2Pdf("P", "A4", "es", true, "UTF-8", 6);
    $html2pdf->pdf->SetDisplayMode("fullpage");
    $html2pdf->writeHTML($content);
    $html2pdf->Output("recibo-${date}.pdf");
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
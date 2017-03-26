<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */



function imprimir_voucher_estacionamiento($numero,$chofer,$patente,$horainicio,$horatermino,$montototal,$comentario){
try {
    // Enter the share name for your USB printer here
    //$connector = null;  
    $connector = new WindowsPrintConnector("EPSON TM-T81 Receipt");

    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    $date=new DateTime();
    $fecha = $date->format('d-m-Y');


    $Chofer =  $chofer;
    $Patente  = $patente;
    $serie = $numero;

    $printer -> text(":::SINDICATO DE PESCADORES ARTESANALES::::\n");
    $printer -> text(":::::::Fono-Fax 2 681046 - Quellon::::::::\n");
    $printer -> text("::::::::Control Ingreso Camiones::::::::::\n");
    $printer -> text("::::::::::::::::::::::::::::::::::::::::::\n\n");
    $printer -> text("Fecha  : $fecha\n");
    $printer -> text("Numero : $serie\n");
    $printer -> text("Chofer : $Chofer\n");
    $printer -> text("Patente: $Patente\n\n");
    $printer -> text("Hora de inicio : $horainicio\n");
    $printer -> text("Hora de Termino: $horatermino\n");
    $printer -> text('Monto total    : $'.$montototal);

    
   
    $printer -> text("\n");
    $printer -> text("\n\n");
    $printer -> text("Firma: _________________\n");
    $printer -> text("$comentario\n");
    $printer -> cut();
    /* Close printer */
    $printer -> close();

    echo "<div class='alert alert-success'><strong>Impresion Correcta</strong></div>";
} catch (Exception $e) {
    echo "No se pudo imprimir " . $e -> getMessage() . "\n";
}
}

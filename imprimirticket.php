<?php 




?>



<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');
include_once("conexion.php");
?>

    <!-- Page Content -->
    <div class="container">
    <?php
    valida_usuario(10);
    ?>
    <?php 

    try {
        
    	$voucher = $_GET['id'];
    	$chofer = $_GET['chofer'];
		$patente =$_GET['patente'];
		$hora_inicio =$_GET['hora_inicio'];
		$hora_termino=$_GET['hora_termino'];
		$monto_total = $_GET['monto'];    
        $correlativo_papel = $_GET['correlativo_papel'];
        $rut_cliente = $_GET['rut_cliente'];
        $fecha_termino_2 = $_GET['fecha_termino_2'];
		$fecha_inicio_2 =$_GET['fecha_inicio_2'];
		
		$comentario1 = ":::::::::::::::ORIGINAL:::::::::::::::::::";
        $comentario2 = ":::::::::::::::COPIA CLIENTE::::::::::::::";



    include('imprimirvoucher.php');
    	imprimir_voucher_estacionamiento($voucher,$chofer,$patente,$hora_inicio,$hora_termino,$monto_total,$comentario1,$correlativo_papel,$rut_cliente,$fecha_termino_2,$fecha_inicio_2);
        imprimir_voucher_estacionamiento($voucher,$chofer,$patente,$hora_inicio,$hora_termino,$monto_total,$comentario2,$correlativo_papel,$rut_cliente,$fecha_termino_2,$fecha_inicio_2);
    } catch (Exception $e) {
    	echo "<div class='alert alert-danger'><strong>Error $e</strong></div>";
    } finally {
    	

    }
    
    echo("<a href='listadoestacionados.php' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>  Volver</a>");

    ?>
    </div>
   	
    
    <!-- /.container -->

   
</body>
</html>

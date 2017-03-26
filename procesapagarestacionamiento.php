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

    	$voucher = $_GET['voucher'];
    	$chofer = $_GET['chofer'];
		$patente =$_GET['patente'];
		$hora_inicio =$_GET['horainicio'];
		$hora_termino=$_GET['horasalida'];
		$monto_total = $_GET['total'];
		//$fecha_inicio_2 =$_GET['fecha_inicio_2'];
		$comentariooriginal = ":::::::::::::::ORIGINAL:::::::::::::::::::";

        $comentariocliente = ":::::::::::::::COPIA CLIENTE::::::::::::::";
		
         $con = new DB;
            $crearpersona = $con->conectar();
            $strConsulta = "update `ingreso_vehiculos` set `hora_termino` = '$hora_termino', `pagado` = '1',
             `monto` = '$monto_total' where id = $voucher";

            //echo $strConsulta;
           if(mysql_query($strConsulta)){
            echo "<div class='alert alert-success'><strong>Se ha realizado el pago satisfactoriamente</strong></div>";

           }else
           {

            echo "<div class='alert alert-danger'><strong>Error</strong></div>";
           }






    	include('imprimirvoucher.php');
    	imprimir_voucher_estacionamiento($voucher,$chofer,$patente,$hora_inicio,$hora_termino,$monto_total,$comentariooriginal);

        imprimir_voucher_estacionamiento($voucher,$chofer,$patente,$hora_inicio,$hora_termino,$monto_total,$comentariocliente);
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

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
    valida_usuario(98);
    ?>
    <?php 

    try {

    	$voucher = $_GET['id'];
        $patente =$_GET['patente'];
    	$chofer = $_GET['chofer'];
        $fecha_inicio =  $_GET['fecha'];


		$pagado =$_GET['pagado'];
		$hora_inicio =$_GET['horainicio'];
		$hora_termino=$_GET['horasalida'];
		$monto_total = $_GET['total'];
         $rut = $_GET['rut'];
        $rut_cliente = $_GET['rut_cliente'];
        $correlativo_papel = $_GET['correlativo_papel'];

        $fecha_termino = $_GET['fechatermino'];

        $fechaTransformadaInicio = transforma_fecha_hora_guardar($fecha_inicio,$hora_inicio);
       $fechaTransformadaSalida = transforma_fecha_hora_guardar($fecha_termino,$hora_termino);
		
         $con = new DB;
            $crearpersona = $con->conectar();
            $strConsulta = "update `ingreso_vehiculos` set `patente` = '$patente',`chofer` = '$chofer',`fecha_inicio` = '$fechaTransformadaInicio',`hora_termino` = '$hora_termino',`hora_inicio` = '$hora_inicio',`pagado` = '$pagado',
             `monto` = '$monto_total',`correlativo_papel` = '$correlativo_papel',`fecha_termino` = '$fechaTransformadaSalida',`rut` = '$rut',`rut_cliente` = '$rut_cliente' where id = $voucher";

            //echo $strConsulta;
           if(mysql_query($strConsulta)){
            echo "<div class='alert alert-success'><strong>Se ha realizado la actualizacion correctamente</strong></div>";

           }else
           {

            echo "<div class='alert alert-danger'><strong>Error</strong></div>";
           }






    
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

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
            $estado = $_GET['estado'];
		
         $con = new DB;
            $crearpersona = $con->conectar();
            $strConsulta = "update `ingreso_vehiculos` set estado=$estado where id = $voucher";

            //echo $strConsulta;
           if(mysql_query($strConsulta)){
            echo "<div class='alert alert-success'><strong>Se ha Modificado Correctamente el Registro</strong></div>";

           }else
           {

            echo "<div class='alert alert-danger'><strong>Error en la ejecucion</strong></div>";
            echo "<div class='alert alert-danger'><strong>Error</strong></div>";
             echo $strConsulta;
           }






    
    } catch (Exception $e) {
    	echo "<div class='alert alert-danger'><strong>Error $e</strong></div>";


    } finally {
    	

    }
    
    echo("<a href='editarregistroestacionamiento.php?id=$voucher' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>  Volver</a>");

    ?>
    </div>
   	
    
    <!-- /.container -->

   
</body>
</html>

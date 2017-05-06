
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
    <div class="container">
    <?php
     include_once("conexion.php");
    // var_dump($_POST);
     $rut = $_POST['rut'];
      $nombre = $_POST['nombre'];
   
    
  
   // echo "El usuario existe";
          $con2 = new DB;
          $insertarregistro = $con2->conectar();
          $fechahoractual = date("Y-m-d H:i:s");
          //echo $fechahoractual;
          $strConsulta = "INSERT INTO `cliente` (`rut_cliente`, `nombre_cliente`) VALUES ( '$rut', '$nombre');";
          $buscarpersona = mysql_query($strConsulta);
          echo("<div class='alert alert-success'><strong>Ingreso Correcto</strong> Se ha Creado el cliente  $rut <strong>$nombre</strong></div>");
   

     ?>


    </div>
    <!-- /.container -->

   
</body>
</html>

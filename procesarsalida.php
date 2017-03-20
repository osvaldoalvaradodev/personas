
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
    $con = new DB;
    $buscarpersona = $con->conectar();
    $strConsulta = "select * from personas where rut ='$rut'";
    $buscarpersona = mysql_query($strConsulta);
    $numfilas = mysql_num_rows($buscarpersona);
    
    //var_dump($numfilas);
    if($numfilas >= 1){
   // echo "El usuario existe";
          $con2 = new DB;
          $insertarregistro = $con->conectar();
          $fechahoractual = date("Y-m-d H:i:s");
          //echo $fechahoractual;
          $strConsulta = "INSERT INTO `registro` (`id`, `registro`, `rut`, `tipo`) VALUES (NULL, '$fechahoractual', '$rut', '0');";
          $buscarpersona = mysql_query($strConsulta);
          echo("<div class='alert alert-success'><strong>Ingreso Correcto</strong> Se ha registrado LA SALIDA al usuario $rut <strong>$fechahoractual</strong></div>");
    }
  


     ?>


    </div>
    <!-- /.container -->

   
</body>
</html>

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
     $username = $_POST['username'];

     $password = $_POST['password'];
    $con = new DB;
    $buscarpersona = $con->conectar();
    $strConsulta = "select * from usuarios where username ='$username' and password = '$password'";
    $buscarpersona = mysql_query($strConsulta);
    $numfilas = mysql_num_rows($buscarpersona);
    
    //var_dump($numfilas);
    if($numfilas >= 1){
    
          $_SESSION["usuarioautentificado"] = $username;
      

          echo "El usuario existe ".$_SESSION["usuarioautentificado"];

          $datosUsuario = mysql_fetch_array($buscarpersona);

          
          $_SESSION["nivelusuario"] = $datosUsuario['id_rol_usuario'];
          redirect('resumendiario.php');

          
    }
    else{
    echo "<div class='alert alert-danger'><strong>Usuario o clave incorrecto</strong></div>";

    $_SESSION["error"]="<div class='alert alert-danger'><strong>Usuario o clave incorrecto</strong></div>";

    echo "<a href='login.php' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>  Volver</a>";
     //redirect('login.php');
    die();
    }


     ?>


    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

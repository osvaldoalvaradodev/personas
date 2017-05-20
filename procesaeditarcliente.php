
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
   

          $rut_cliente = $_GET['rut_cliente'];
      $tipo_modificacion = $_GET['boton1'];
              $nombre_cliente = $_GET['nombre_cliente'];
   // echo "El usuario existe";
          $con2 = new DB;
          $insertarregistro = $con2->conectar();
      
          //echo $fechahoractual;

       switch ($tipo_modificacion) {
         case 'guardar_cambios':
                $strConsulta = "update `cliente` set `nombre_cliente` = '$nombre_cliente' where rut_cliente ='$rut_cliente';";
           break;

            case 'habilitar':
                $strConsulta = "update `cliente` set `estado` = 1 where rut_cliente ='$rut_cliente';";
           break;
                 case 'deshabilitar':
                $strConsulta = "update `cliente` set estado = 0 where rut_cliente ='$rut_cliente';";
           break;

         
         default:
             $strConsulta = "update `cliente` set `nombre_cliente` = '$nombre_cliente' where rut_cliente ='$rut_cliente';";
           break;
       }
             
        


         
          if( mysql_query($strConsulta)){
              echo("<div class='alert alert-success'><strong>Se ha actualizado el cliente con exito!!</strong></div>");
                    

          }else{

                 echo("<div class='alert alert-warning'><strong>error al actualizar</strong></div>");
          }
          

           echo("<a href='listadoclientes.php' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>  Volver</a>");
    die();
    


     ?>


    </div>
    <!-- /.container -->

   
</body>
</html>

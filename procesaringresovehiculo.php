
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
     $fecha = $_POST['fecha'];
       $horainicio = $_POST['horainicio'];
        $fecha = $_POST['fecha'];
         $chofer = $_POST['chofer'];
        $patente = $_POST['patente'];

        $id_tipo_vehiculo = $_POST['tipovehiculo'];
          $fechaactual = date("Y-m-d");

            //parseo la fecha para poder realizar la insercion
         //echo $fecha;

            $fechaTransformada = transforma_fecha_hora_guardar($fecha,$horainicio);

            //echo $fechaTransformada;
           

            


            $horaactual = date("H:i:s");

      $con2 = new DB;
       $insertarregistro = $con2->conectar();
       $fechahoractual = date("Y-m-d H:i:s");
        //echo $fechahoractual;


        $strConsulta = "INSERT INTO `ingreso_vehiculos`(`patente`, `chofer`, `fecha_inicio`, `hora_inicio`,`id_tipo`) VALUES ('$patente','$chofer','$fechaTransformada','$horainicio','$id_tipo_vehiculo')";

          //  echo $strConsulta;
         if(mysql_query($strConsulta)){
             echo("<div class='alert alert-success'><strong>Ingreso Correcto</strong><br> Se ha ingresado el vehiculo<br><i class='fa fa-check-square-o' aria-hidden='true'></i>
        </strong></div>");
         }
         else {
            echo("<div class='alert alert-danger'><strong>Ingreso Incorrecto</strong> No se ha registrado</strong></div>");
         }
         
           echo("<a href='ingresovehiculo.php' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>  Volver</a>");

//INSERT INTO `ingreso_vehiculos`(`id`, `patente`, `chofer`, `fecha_inicio`, `hora_inicio`, `hora_termino`, `monto`, `id_tipo`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])
     ?>


    </div>
    <!-- /.container -->

   
</body>
</html>

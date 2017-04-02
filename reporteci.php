

<?php
session_start();
 include('header.php');?>
<body>
<?php include('navbar.php');?>

<?php 
valida_usuario(10);
?>


  <div class="container">
     

  <!--Contenedor para buscar datos -->
   <form action="reporteci.php" method="GET">
              <div class="form-group">
                  <div class="col-xs-3">
                 <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                  <input type="text" class="form-control" placeholder="02" aria-describedby="basic-addon1" id="mesbuscar" name="mesbuscar">
                   <input type="text" class="form-control" placeholder="2017" aria-describedby="basic-addon1" id="aniobuscar" name="aniobuscar">

                  <input type="text" class="form-control" placeholder="17999388" aria-describedby="basic-addon1" id="rutbuscar" name="rutbuscar">
                  </div>
                       </div>
                       <button type="submit" class="btn btn-default">Buscar</button> 
                       <?php 

                       if(isset($_GET['fechabuscar'])){
                       echo("<a href='listadoestacionados.php' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>Volver</a>");}
                       ?>
                       </div>
            </form>

<br><br><br>



<?php 
     include_once("conexion.php");
          //si el rut es * CUALQUIERA
  

  if(isset($_GET['mesbuscar'])){
    $mesbuscado =$_GET['mesbuscar'];
     $aniobuscado =$_GET['aniobuscar'];
    $rutbuscado =$_GET['rutbuscar'];
     $strConsulta = "SELECT *,DATE_FORMAT(ingreso_vehiculos.fecha_inicio, '%d-%m-%Y') as fecha_inicio_2 FROM `ingreso_vehiculos` left join tipo_vehiculos on ingreso_vehiculos.id_tipo = tipo_vehiculos.id_tipo_vehiculo where MONTH(ingreso_vehiculos.fecha_inicio) = $mesbuscado and YEAR(ingreso_vehiculos.fecha_inicio) = $aniobuscado and ingreso_vehiculos.rut = '$rutbuscado'
and ingreso_vehiculos.id_formato_boleta = 2";

     //echo $strConsulta;
  }
  else{
  $strConsulta = "SELECT *,DATE_FORMAT(ingreso_vehiculos.fecha_inicio, '%d-%m-%Y') as fecha_inicio_2 FROM `ingreso_vehiculos`

left join tipo_vehiculos on ingreso_vehiculos.id_tipo = tipo_vehiculos.id_tipo_vehiculo  where DATE(ingreso_vehiculos.fecha_inicio) = DATE(NOW()) order by ingreso_vehiculos.id desc";
  }


//echo($strConsulta);

echo $strConsulta;

 $con = new DB;
    $buscarregistros = $con->conectar();
$buscarregistros = mysql_query($strConsulta);
$numregistros = mysql_num_rows($buscarregistros);
$montototal = 0;



    echo '<table class="display" id="tablafactura" cellspacing="0" width="100%">';
echo '<thead><tr><td>Id</td><td>Patente</td><td>Chofer</td><td>Fecha</td><td>Hora Ingreso</td><td>Hora Salida</td><td>Monto</td><td>Pagado</td><td>Acciones</td></tr></thead>';
for ($i=0; $i<$numregistros; $i++)
{
$fila = mysql_fetch_array($buscarregistros);
$numlista = $i + 1;



echo '<tr><td>'.$fila['id'].'</td>';
echo '<td>'.$fila['patente'].'</td>';
echo '<td>'.$fila['chofer'].'</td>';
echo '<td>'.$fila['fecha_inicio_2'].'</td>';
echo '<td>'.$fila['hora_inicio'].'</td>';
 if ($fila['pagado']=='1'){


          echo '<td>'.$fila['hora_termino'].'</td>';  
          }
          else{
              echo '<td>-</td>';
          }

//sumo monto por cada iteracion

          $montototal = $montototal+$fila['monto'];
echo '<td>'.$fila['monto'].'</td>';

            
      



 if ($fila['pagado']=='1'){


          echo '<td><span class="label label-success">Pagado</span></td>';  


              echo "<td><a href='imprimirticket.php?id=".$fila['id']."&patente=".$fila['patente']."&chofer=".$fila['chofer']."&hora_inicio=".$fila['hora_inicio']."&fecha_inicio=".$fila['fecha_inicio']."&fecha_inicio_2=".$fila['fecha_inicio_2']."&hora_termino=".$fila['hora_termino']."&monto=".$fila['monto']."' class='btn btn-default'><span class='glyphicon glyphicon-print'></span>Imprimir</a></td>";
          }
          else{
              echo '<td><span class="label label-danger">No Pagado</span></td>';
          
              echo "<td><a href='pagarestacionamiento.php?id=".$fila['id']."&patente=".$fila['patente']."&chofer=".$fila['chofer']."&hora_inicio=".$fila['hora_inicio']."&fecha_inicio=".$fila['fecha_inicio']."&fecha_inicio_2=".$fila['fecha_inicio_2']."&precio=".$fila['precio_tipo_vehiculo']."&id_formato_boleta=".$fila['id_formato_boleta']."&rut=".$fila['rut']."' class='btn btn-default'><span class='glyphicon glyphicon-edit'></span>Pagar</a></td>";
          }

        

echo '</tr>';
}
echo "</table>";
 echo ('</div>');



 
?>





    </div>
    <!-- /.container -->

   
</body>
</html>



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
  <span><b>Ingrese fecha para buscar dias anteriores:</b></span>
   <form action="listadoestacionados.php" method="GET">
              <div class="well">
                  <div class="col-xs-3">
                 <div class="input-group">


                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                  <input type="text" class="form-control" placeholder="20/02/2017" <?php if(isset($_GET['fechabuscar'])){ echo "value='".$_GET['fechabuscar']."'";} ?> aria-describedby="basic-addon1" id="fechabuscar" name="fechabuscar">
                  </div>
                       </div>
                       <button type="submit" class="btn btn-default">Buscar</button> 
                       <?php 

                       if(isset($_GET['fechabuscar'])){
                       echo("<a href='listadoestacionados.php' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>Volver</a>");}
                       ?>
                       </div>
            </form>
<br><br>




<?php 
     include_once("conexion.php");
          //si el rut es * CUALQUIERA
  

  if(isset($_GET['fechabuscar'])){
    $busquedaVar =$_GET['fechabuscar'];

     $strConsulta = "SELECT *,DATE_FORMAT(ingreso_vehiculos.fecha_inicio, '%d-%m-%Y') as fecha_inicio_2,DATE_FORMAT(ingreso_vehiculos.fecha_termino, '%d-%m-%Y') as fecha_termino_2 FROM `ingreso_vehiculos`
left join tipo_vehiculos on ingreso_vehiculos.id_tipo = tipo_vehiculos.id_tipo_vehiculo  where date_format(ingreso_vehiculos.fecha_inicio,'%d/%m/%Y') = date_format(str_to_date('$busquedaVar','%d/%m/%Y') ,'%d/%m/%Y')";

     //echo $strConsulta;
  }
  else{
  $strConsulta = "SELECT *,DATE_FORMAT(ingreso_vehiculos.fecha_inicio, '%d-%m-%Y') as fecha_inicio_2,DATE_FORMAT(ingreso_vehiculos.fecha_termino, '%d-%m-%Y') as fecha_termino_2 FROM `ingreso_vehiculos`

left join tipo_vehiculos on ingreso_vehiculos.id_tipo = tipo_vehiculos.id_tipo_vehiculo  where DATE(ingreso_vehiculos.fecha_inicio) >= DATE(NOW()) - INTERVAL 1 DAY order by ingreso_vehiculos.id desc";
  }


//echo($strConsulta);



 $con = new DB;
    $buscarregistros = $con->conectar();
$buscarregistros = mysql_query($strConsulta);
$numregistros = mysql_num_rows($buscarregistros);


//var_dump(mysql_fetch_array($buscarregistros));

    echo '<table class="display" id="tablavehiculos" cellspacing="0" width="100%">';
echo '<thead><tr><td>Id</td><td>Patente</td><td>Chofer</td><td>Fecha Ingreso</td><td>Fecha Salida</td><td>Hora Ingreso</td><td>Hora Salida</td><td>Monto</td><td>Tipo</td><td>Pagado</td><td>Acciones</td></tr></thead>';

for ($i=0; $i<$numregistros; $i++)
{
$fila = mysql_fetch_array($buscarregistros);
$numlista = $i + 1;

echo '<tr><td>'.$fila['id'].'</td>';
echo '<td>'.$fila['patente'].'</td>';
echo '<td>'.$fila['chofer'].'</td>';
echo '<td>'.$fila['fecha_inicio_2'].'</td>';
echo '<td>'.$fila['fecha_termino_2'].'</td>';
echo '<td>'.$fila['hora_inicio'].'</td>';
 if ($fila['pagado']=='1'){


          echo '<td>'.$fila['hora_termino'].'</td>';  
          }
          else{
              echo '<td>-</td>';
          }


echo '<td>'.$fila['monto'].'</td>';


switch ($fila['id_formato_boleta']) {
  case '1':
    $formatoboleta = '<span class="label label-primary">Boleta</span>';
    break;
   case '2':
     $formatoboleta = '<span class="label label-info">CI</span>';
    break;
     case '3':
     $formatoboleta = '<span class="label label-warning">Conveio</span>';
    break;
  default:
    $formatoboleta = '<span class="label label-primary">Boleta</span>';
    break;
}
   echo '<td>'.$formatoboleta.'</td>';
 
    



 if ($fila['pagado']=='1'){
          echo '<td><span class="label label-success">Pagado</span></td>';  
        }
         else{
              echo '<td><span class="label label-danger">No Pagado</span></td>';
            }


?>
<TD>
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Acciones
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    
    <!--<li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>-->
  


<?PHP


 if ($fila['pagado']=='1'){





              echo "<li><a href='imprimirticket.php?id=".$fila['id']."&patente=".$fila['patente']."&chofer=".$fila['chofer']."&hora_inicio=".$fila['hora_inicio']."&fecha_inicio=".$fila['fecha_inicio']."&fecha_inicio_2=".$fila['fecha_inicio_2']."&hora_termino=".$fila['hora_termino']."&monto=".$fila['monto']."&correlativo_papel=".$fila['correlativo_papel']."&fecha_termino_2=".$fila['fecha_termino_2']."&rut_cliente=".$fila['rut_cliente']."'><i class='glyphicon glyphicon-print'></i> Imprimir</a></li>";
              

          }
          else{
             
          
              echo "<li><a href='pagarestacionamiento.php?id=".$fila['id']."&patente=".$fila['patente']."&chofer=".$fila['chofer']."&hora_inicio=".$fila['hora_inicio']."&fecha_inicio=".$fila['fecha_inicio']."&fecha_inicio_2=".$fila['fecha_inicio_2']."&precio=".$fila['precio_tipo_vehiculo']."&id_formato_boleta=".$fila['id_formato_boleta']."&rut=".$fila['rut']."&rut_cliente=".$fila['rut_cliente']."&correlativo_papel=".$fila['correlativo_papel']."'><i class='glyphicon glyphicon-edit'></i> Pagar</a></li>";
          }
            //esto esta asi para poder concatenar el texto
            echo "<li><a href='editarregistroestacionamiento.php?id=".$fila['id']."&patente=".$fila['patente']."&chofer=".$fila['chofer']."&hora_inicio=".$fila['hora_inicio']."&fecha_inicio=".$fila['fecha_inicio']."&fecha_inicio_2=".$fila['fecha_inicio_2']."&precio=".$fila['precio_tipo_vehiculo']."&id_formato_boleta=".$fila['id_formato_boleta']."&rut=".$fila['rut']."&rut_cliente=".$fila['rut_cliente']."&correlativo_papel=".$fila['correlativo_papel']."'";
            ?>
            class="<?php ocultar_elemento(98);?>"
            <?php echo "><i class='glyphicon glyphicon-edit'></i> Editar Registro</a></li>";


        
?>
</ul>
</div>
</TD>


<?php
echo '</tr>';
}
echo "</table>";
 echo ('</div>');



 
?>





    </div>
    <!-- /.container -->

   
</body>
</html>

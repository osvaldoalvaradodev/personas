

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

  <?php 

  if(isset($_GET['mesbuscar'])){
  }
  else{
  ?>

  <div class="well">
  <h2>Ingrese los datos para generar reporte Convenio</h2>
   <form action="reporteconvenio.php" method="GET">
              <div class="form-group">
                  <div class="col-xs-3">
                 <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                  <input type="text" class="form-control" placeholder="02 (mes...)" aria-describedby="basic-addon1" id="mesbuscar" name="mesbuscar">
                   <input type="text" class="form-control" placeholder="2017 (año...)" aria-describedby="basic-addon1" id="aniobuscar" name="aniobuscar">

                  <input type="text" class="form-control" placeholder="17999388 (Rut...)" aria-describedby="basic-addon1" id="rutbuscar" name="rutbuscar">
                  </div>
                       </div>
                       <button type="submit" class="btn btn-default">Buscar</button> 
                       <?php 

                       if(isset($_GET['fechabuscar'])){
                       echo("<a href='listadoestacionados.php' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>Volver</a>");}
                       ?>
                       </div>
            </form>

<br><br><br></div>

<?php
  //borra el formulario de busqueda cuando el mes esta seteado
  } ?>

<?php 
     include_once("conexion.php");
          //si el rut es * CUALQUIERA
  

  if(isset($_GET['mesbuscar'])){
    $mesbuscado =$_GET['mesbuscar'];
     $aniobuscado =$_GET['aniobuscar'];
    $rutbuscado =$_GET['rutbuscar'];
     $strConsulta = "SELECT *,DATE_FORMAT(ingreso_vehiculos.fecha_inicio, '%d-%m-%Y') as fecha_inicio_2,DATE_FORMAT(ingreso_vehiculos.fecha_termino, '%d-%m-%Y') as fecha_termino_2 FROM `ingreso_vehiculos` left join tipo_vehiculos on ingreso_vehiculos.id_tipo = tipo_vehiculos.id_tipo_vehiculo where MONTH(ingreso_vehiculos.fecha_inicio) = $mesbuscado and YEAR(ingreso_vehiculos.fecha_inicio) = $aniobuscado and ingreso_vehiculos.rut = '$rutbuscado'
and ingreso_vehiculos.id_formato_boleta = 3 and ingreso_vehiculos.estado =1";

    
  }
  else{
  $strConsulta = "SELECT *,DATE_FORMAT(ingreso_vehiculos.fecha_inicio, '%d-%m-%Y') as fecha_inicio_2 FROM `ingreso_vehiculos`

left join tipo_vehiculos on ingreso_vehiculos.id_tipo = tipo_vehiculos.id_tipo_vehiculo  where DATE(ingreso_vehiculos.fecha_inicio) = DATE(NOW()) order by ingreso_vehiculos.id desc";
  }


//echo($strConsulta);

//echo $strConsulta;


if(isset($_GET['mesbuscar'])){
$con = new DB;
$buscarregistros2 = $con->conectar();
$buscarregistros2 = mysql_query($strConsulta);
$numregistros2 = mysql_num_rows($buscarregistros2);

//recorro para obtener el total
$monto_total = 0;
$nombre_cliente = "";
for ($i=0; $i<$numregistros2; $i++)
{
$fila = mysql_fetch_array($buscarregistros2);
$monto_total= intval($fila['monto']) + $monto_total;

}
?>

<?php
$nombre_titulo="<div class='well'>Rut     : ".$rutbuscado." <br>Mes    : ".$mesbuscado." Año: ".$aniobuscado."<br>Monto  : $".$monto_total."</div>";
?>
<script language="JavaScript">
window.document.title = "Reporte Convenio Estacionamiento";


var titulo_reporte = "<?php echo $nombre_titulo; ?>";


$(document).ready(function() {
      $('#tablafactura').DataTable({
            



            dom: 'lBfrtip',
             

            "order": [[ 0, "desc" ]],
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina &nbsp;&nbsp;&nbsp;",
            "zeroRecords": "No se encuentra esa coincidencia",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "print" : "Imprimir",

            "infoFiltered": "(buscando entre _MAX_ registros)",
            "search":         "Buscar : &nbsp",
               paginate: {
                first:      "Primera Pagina",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Ultima"
            }
        }

        ,buttons: [
            {
                extend: 'print',message: titulo_reporte,text: 'Imprimir',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            ''
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ,'excel',]
      });
    } 




    );




</script> 


<h3>Rut a Facturar: <?php echo $rutbuscado?></h3>

<h3>Mes : <?php echo $mesbuscado." - Año :".$aniobuscado?></h3>
<h3>Monto Total: $<?php echo $monto_total?></h3>


<?php


$buscarregistros = $con->conectar();
$buscarregistros = mysql_query($strConsulta);
$numregistros = mysql_num_rows($buscarregistros);


    echo '<table class="display" id="tablafactura" cellspacing="0" width="100%">';
echo '<thead><tr><th>Id</th><th>Patente</th><th>Chofer</th><th>Fecha</th><th>Hora Ingreso</th><th>Fecha Salida</th><th>Hora Salida</th><th>Monto</th><th>Pagado</th></tr></thead>';
for ($i=0; $i<$numregistros; $i++)
{
$fila = mysql_fetch_array($buscarregistros);
$numlista = $i + 1;



echo '<tr><th>'.$fila['id'].'</th>';
echo '<th>'.$fila['patente'].'</th>';
echo '<th>'.$fila['chofer'].'</th>';
echo '<th>'.$fila['fecha_inicio_2'].'</th>';
echo '<th>'.$fila['hora_inicio'].'</th>';
 if ($fila['pagado']=='1'){


          echo '<th>'.$fila['hora_termino'].'</th>';  
            echo '<th>'.$fila['fecha_termino_2'].'</th>';  
          }
          else{
              echo '<th>-</th>';
                   echo '<th>-</th>';
          }

//sumo monto por cada iteracion

    
echo '<th>'.$fila['monto'].'</th>';

            
      



 if ($fila['pagado']=='1'){


          echo '<th><span class="label label-success">Pagado</span></th>';  


           
          }
          else{
              echo '<th><span class="label label-danger">No Pagado</span></th>';
          
       
          }

        

echo '</tr>';
}
echo "</table>";
 echo ('</div>');



 }
 else{


 }
?>





    </div>
    <!-- /.container -->

   
</body>
</html>

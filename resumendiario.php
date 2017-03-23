<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->


              <?php
        valida_usuario(98);

     include_once("conexion.php");
    // var_dump($_POST);
	
	//si esta seteado el dia para consultar utilizalo
	if(isset($_POST['fechaconsulta'])){
		
		$diaconsulta = $_POST['fechaconsulta'];
	//si no esta seteado no lo utilizes
	}else{
		$diaconsulta = date("d-m-Y");
		
	}
  
    $con = new DB;
    $buscarregistros= $con->conectar();


    //si rut esta seteado consulta los datos de ese rut
    if(isset($_GET['buscar'])){

            $rutbuscado = $_GET['buscar'];
            $strConsulta = "select * from registro inner join personas on registro.rut = personas.rut  WHERE day(registro) = DAY(now())   and (personas.rut like '%$rutbuscado%' or personas.nombre like '%$rutbuscado%' or personas.apellido like '%$rutbuscado%') and MONTH(registro) = MONTH(now()) and year(registro) = year(now()) order by registro asc";

           // echo $strConsulta;
        }
    else{
            $strConsulta = "select * from registro inner join personas on registro.rut = personas.rut  WHERE day(registro) = DAY(now()) and MONTH(registro) = MONTH(now()) and year(registro) = year(now())  order by registro asc";

    }
   // echo $strConsulta;

     $strConsultaTotal = "select * from registro inner join personas on registro.rut = personas.rut  WHERE day(registro) = DAY(now()) and MONTH(registro) = MONTH(now()) and year(registro) = year(now()) order by registro asc";

    $buscarregistros = mysql_query($strConsulta);
    $numFilasReportes = mysql_num_rows($buscarregistros);

  $buscarregistrosTotales = mysql_query($strConsultaTotal);
    $IngresosTotales = mysql_num_rows($buscarregistrosTotales);


    //consulto por los ingresos de hoy
    $totalIngresosQuery = "select count(*) as cantidad from registro WHERE day(registro) = DAY(now()) and MONTH(registro) = MONTH(now()) and year(registro) = year(now()) and tipo = 1";
    $totalIngresosDatos = mysql_query($totalIngresosQuery);
    $totalIngresosArray = mysql_fetch_assoc($totalIngresosDatos);
    $totalIngresosInteger = $totalIngresosArray['cantidad'];


     //consulto por las salidas de hoy
    $totalSalidasQuery = "select count(*) as cantidad from registro WHERE day(registro) = DAY(now()) and MONTH(registro) = MONTH(now()) and year(registro) = year(now()) and tipo = 0";
    $totalSalidasDatos = mysql_query($totalSalidasQuery);
    $totalSalidasArray = mysql_fetch_assoc($totalSalidasDatos);
    $totalSalidasInteger = $totalSalidasArray['cantidad'];



     //consulto por las salidas de hoy
          if(isset($_GET['buscar'])){

            $rutbuscado = $_GET['buscar'];
            $totalRecintoQuery = "select personas.rut,personas.nombre,personas.apellido,(select registro from registro where rut=personas.rut and tipo = 1 order by registro desc limit 1) as UltimoIngreso, (select registro from registro where rut=personas.rut and tipo = 0 order by registro desc limit 1) as UltimaSalida,area.nombre as nombre_area from personas inner join area on personas.id_area = area.id where (personas.rut like '%$rutbuscado%' or personas.nombre like '%$rutbuscado%' or personas.rut like '%$rutbuscado%') ";
          }

          else{
            $totalRecintoQuery = "select personas.rut,personas.nombre,personas.apellido,(select registro from registro where rut=personas.rut and tipo = 1 order by registro desc limit 1) as UltimoIngreso, (select registro from registro where rut=personas.rut and tipo = 0 order by registro desc limit 1) as UltimaSalida,area.nombre as nombre_area from personas inner join area on personas.id_area = area.id";

          }
    
    $BuscarRecintoDatos = mysql_query($totalRecintoQuery);
   // $totalRecintoRegistros = mysql_fetch_array($BuscarRecintoDatos);

    $numFilasRecinto = mysql_num_rows($BuscarRecintoDatos);


	?>
    <div class="container">
       <div class="row">
          <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                 <i class="glyphicon glyphicon-home" style="font-size: 4em"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo calcular_personas_en_recinto();?></div>
                                    <div><b>Personas en recinto</b></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>




                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-log-in" style="font-size: 4em"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalIngresosInteger;?></div>
                                    <div>Total Ingresos Hoy</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Detalles</span>
                                <span class="pull-right">
								<i class="fa fa-arrow-circle-right"></i>
								</span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                     <i class="glyphicon glyphicon-log-out" style="font-size: 4em"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalSalidasInteger;?></div>
                                    <div>Total Salidas Hoy</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Detalles</span>
                                <span class="pull-right">
								<i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              
           
            </div>
            </div>
			
		<div class="container">
               <form action="resumendiario.php" method="GET">
              <div class="form-group">
            
                  <div class="col-xs-3">
                 <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                  <input type="text" class="form-control" placeholder="rut nombre o apellido" aria-describedby="basic-addon1" id="buscar" name="buscar">
                  </div>
                       </div>
               
              <button type="submit" class="btn btn-success">Buscar Persona</button> 

              
              <?php 

                if(isset($_GET['buscar'])){

                 
                  
                    echo "<br><br><div class='alert alert-success'><strong>Las personas listadas a continuacion, se encuentran al interior del recinto</strong> </div>";
                  
                  
                }
              ?>
              </div>
            </form>







		<?php 

        /*
		echo '<table class="table">';
echo '<thead><tr><td>No.</td><td>Registro</td><td>Rut</td><td>Nombre</td><td>Apellido</td><td>Tipo</td></tr></thead>';
for ($i=0; $i<$numFilasReportes; $i++)
{
$fila = mysql_fetch_array($buscarregistros);
$numlista = $i + 1;
echo '<tr><td>'.$numlista.'</td>';
echo '<td>'.$fila['registro'].'</td>';
echo '<td>'.$fila['rut'].'</td>';
echo '<td>'.$fila['nombre'].'</td>';
echo '<td>'.$fila['apellido'].'</td>';

  //si es ingreso o salida iluminalo
          if ($fila['tipo']=='1'){


          echo '<td><span class="label label-success">Ingreso</span></td>';  
          }
          else{
              echo '<td><span class="label label-danger">Salida</span></td>';
          }
echo '</tr>';
}
echo "</table>";*/
?>


<?php 
        echo '<table class="table" id="tablausuarios">';
echo '<thead><tr><td><b>No.</b></td><td><b>Rut</b></td><td><b>Nombre</b></td><td><b>Apellido</b></td><td><b>Area</b></td><td><b>Foto</b></td><td><b>Ultimo Ingreso</b></td><td><b>Ultima Salida</b></td></tr></thead>';


for ($i=0; $i<$numFilasRecinto; $i++)
{


$fila2 = mysql_fetch_array($BuscarRecintoDatos);
$numlista2 = $i + 1;

if ($fila2['UltimoIngreso']>$fila2['UltimaSalida']){

echo '<tr><td>'.$numlista2.'</td>';
echo '<td>'.$fila2['rut'].'</td>';
echo '<td>'.$fila2['nombre'].'</td>';
echo '<td>'.$fila2['apellido'].'</td>';
echo '<td>'.utf8_encode($fila2['nombre_area']).'</td>';

           
            $nombre_fichero = 'fotos/'.$fila2['rut'].'.jpg';

            if (file_exists($nombre_fichero)) {
               

                echo "<td><span class='label label-success'><span class='glyphicon glyphicon-camera' aria-hidden='true'></span></span></td>";
            } else {
                echo "<td></td>";
            }
          

echo '<td>'.$fila2['UltimoIngreso'].'</td>';
echo '<td>'.$fila2['UltimaSalida'].'</td>';
}

  //si es ingreso o salida iluminalo
    
echo '</tr>';
}
echo "</table>";

?>
		
	

		</div>

   


   <div>
  
        

        </div>
    <!-- /.container -->

   
</body>
</html>
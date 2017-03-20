<!DOCTYPE html>
<html lang="en">
<?php 

session_start();
include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
<?php 
valida_usuario(98);
?>
    
    <div class="container">
     
              

            
    <?php 
 if (isset($_GET['fecha'])){

    echo ('<div class="container">');
   include_once("conexion.php");
    $con = new DB;

    $fechaBuscar = $_GET['fecha'];


    $buscarregistros= $con->conectar();
    $rut = $_GET['rut'];
    $tipo = $_GET['tipo'];
    $tipoStr = "AND (registro.tipo = 1 or registro.tipo = 0)";

    //si tipo es = a 1 o TIPO es igual a 0, si no es todo
    if ($tipo == 1){
    	$tipoStr = "AND (registro.tipo = 1)";
    }elseif($tipo==0){
    	$tipoStr = "AND (registro.tipo = 0)";

    }



			    //si el rut es * CUALQUIERA
			    if ($_GET['rut']=='*'){
			    	 $strConsulta = "select 

             personas.nombre,personas.apellido,personas.rut,registro.registro,registro.tipo,
             case when registro.tipo = 1
            THEN
            'ingreso'
            ELSE
            'salida'
            end as tipo2,
            year(registro.registro) as ano,
            month(registro.registro) as mes,
            day(registro.registro) as dia
              from registro inner join personas on personas.rut = registro.rut WHERE date_format(registro,'%d/%m/%Y') = date_format(str_to_date('$fechaBuscar','%d/%m/%Y'),'%d/%m/%Y') $tipoStr order by registro asc";
			    }
			    //si el rut esta seteado
			       else{
			    	$strConsulta = "select 
            personas.nombre,personas.apellido,personas.rut,registro.registro,registro.tipo,
            case when registro.tipo = 1
                THEN
                'ingreso'
                ELSE
                'salida'
                end as tipo2,
                year(registro.registro) as ano,
                month(registro.registro) as mes,
                day(registro.registro) as dia
             from registro inner join personas on personas.rut = registro.rut WHERE date_format(registro,'%d/%m/%Y') = date_format(str_to_date('$fechaBuscar','%d/%m/%Y'),'%d/%m/%Y') and registro.rut = $rut $tipoStr order by registro asc";


			    }

	

          //seteo la consulta como una variable de sesion
          $_SESSION["consultaexcel"] = $strConsulta;


    //echo $strConsulta;

    //echo $strConsulta;

    try{
    $buscarregistros = mysql_query($strConsulta);
    $numregistros = mysql_num_rows($buscarregistros);

    } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }

      //echo "<a href='excel2/app/reportes/generarreporte.php'>Reporte</a>";


      echo "<a href='excel2/app/reportes/generarreporte.php' class='btn btn-success'>
    <span class='glyphicon glyphicon-print'></span> Descargar Reporte en Excel
  </a>";
    echo '<table class="table">';
echo '<thead><tr><td>No.</td><td>Registro</td><td>Rut</td><td>Nombre</td><td>Apellido</td><td>Tipo</td></tr></thead>';
for ($i=0; $i<$numregistros; $i++)
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
echo "</table>";
 echo ('</div>');



 }
?>



    </div>
    <!-- /.container -->

   
</body>
</html>
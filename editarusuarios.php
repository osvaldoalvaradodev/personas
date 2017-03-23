

<?php
session_start();
 include('header.php');?>
<body>
<?php include('navbar.php');?>

<?php 
valida_usuario(98);
?>


  <div class="container">
     

  <!--Contenedor para buscar datos -->
   <form action="editarusuarios.php" method="GET">
              <div class="form-group">
                  <div class="col-xs-3">
                 <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                  <input type="text" class="form-control" placeholder="rut, nombre o apellido" aria-describedby="basic-addon1" id="buscar" name="buscar">
                  </div>
                       </div>
                       <button type="submit" class="btn btn-default">Buscar</button> 
                       <?php 

                       if(isset($_GET['buscar'])){
                       echo("<a href='editarusuarios.php' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>Volver</a>");}
                       ?>
                       </div>
            </form>





<?php 
     include_once("conexion.php");
          //si el rut es * CUALQUIERA
  

  if(isset($_GET['buscar'])){
    $busquedaVar =$_GET['buscar'];

     $strConsulta = "select *,personas.nombre as nombre_persona,area.nombre as nombre_area from personas inner join area on personas.id_area = area.id where rut like '%$busquedaVar%' or personas.nombre like '%$busquedaVar%' or apellido like '%$busquedaVar%'";

     //echo $strConsulta;
  }
  else{
  $strConsulta = "select *,personas.nombre as nombre_persona,area.nombre as nombre_area from personas inner join area on personas.id_area = area.id";
  }

 $con = new DB;
    $buscarregistros = $con->conectar();
$buscarregistros = mysql_query($strConsulta);
$numregistros = mysql_num_rows($buscarregistros);




    echo '<table class="display" id="tablausuarios" cellspacing="0" width="100%">';
echo '<thead><tr><th>Rut</th><th>Nombre</th><td>Apellido</td><td>Telefono</td><td>Direccion</td><td>Area</td><td>Email</td><td>Notas</td><td>Fotos</td><td>Estado</td><td>Editar</td></tr></thead>';
for ($i=0; $i<$numregistros; $i++)
{
$fila = mysql_fetch_array($buscarregistros);
$numlista = $i + 1;

echo '<tr><td>'.$fila['rut'].'</td>';
echo '<td>'.$fila['nombre_persona'].'</td>';
echo '<td>'.$fila['apellido'].'</td>';
echo '<td>'.$fila['telefono'].'</td>';
echo '<td>'.$fila['direccion'].'</td>';
echo '<td>'.utf8_encode($fila['nombre_area']).'</td>';
echo '<td>'.$fila['email'].'</td>';
echo '<td>'.$fila['notas'].'</td>';
            $nombre_fichero = 'fotos/'.$fila['rut'].'.jpg';
            if (file_exists($nombre_fichero)) {     

                echo "<td><span class='label label-success'><span class='glyphicon glyphicon-camera' aria-hidden='true'></span></span></td>";
            } else {
                echo "<td></td>";
            }



 if ($fila['estado']=='1'){


          echo '<td><span class="label label-success">Activo</span></td>';  
          }
          else{
              echo '<td><span class="label label-danger">Inactivo</span></td>';
          }
echo "<td><a href='procesaeditarusuario.php?rut=".$fila['rut']."&nombre=".$fila['nombre_persona']."&apellido=".$fila['apellido']."&telefono=".$fila['telefono']."&direccion=".$fila['direccion']."&email=".$fila['id_area']."&id_area=".$fila['id_area']."&notas=".$fila['notas']."&email=".$fila['email']."&estado=".$fila['estado']."' class='btn btn-default'><span class='glyphicon glyphicon-edit'></span> Editar</a></td>";
        

echo '</tr>';
}
echo "</table>";
 echo ('</div>');



 
?>



    </div>
    <!-- /.container -->

   
</body>
</html>

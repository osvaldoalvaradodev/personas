

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




<?php 
     include_once("conexion.php");
          //si el rut es * CUALQUIERA
  

  if(isset($_GET['buscar'])){
    $busquedaVar =$_GET['buscar'];

     $strConsulta = "select * from cliente";

     //echo $strConsulta;
  }
  else{
  $strConsulta = "select * from cliente";
  }

 $con = new DB;
    $buscarregistros = $con->conectar();
$buscarregistros = mysql_query($strConsulta);
$numregistros = mysql_num_rows($buscarregistros);




    echo '<table class="display" id="tablausuarios" cellspacing="0" width="100%">';
echo '<thead><tr><td>Rut</td><td>Nombre</td><td>Estado</td><td>Acciones</td></tr></thead>';
for ($i=0; $i<$numregistros; $i++)
{
$fila = mysql_fetch_array($buscarregistros);
$numlista = $i + 1;

echo '<tr><td>'.$fila['rut_cliente'].'</td>';
echo '<td>'.$fila['nombre_cliente'].'</td>';



 if ($fila['estado']=='1'){


          echo '<td><span class="label label-success">Activo</span></td>';  
          }
          else{
              echo '<td><span class="label label-danger">Inactivo</span></td>';
          }
echo "<td><a href='editarcliente.php?rut=".$fila['rut_cliente']."' class='btn btn-default'><span class='glyphicon glyphicon-edit'></span> Editar</a></td>";
        

echo '</tr>';
}
echo "</table>";
 echo ('</div>');



 
?>



    </div>
    <!-- /.container -->

   
</body>
</html>

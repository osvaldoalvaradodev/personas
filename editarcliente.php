<?php 




?>



<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
    <div class="container">
    <?php
    valida_usuario(98);

    $rut = $_GET['rut'];
	


  
	// The diff-methods returns a new DateInterval-object...


 include_once("conexion.php");



$con2 = new DB;
    $buscarpersona3 = $con2->conectar();

    //echo $rut_cliente;
    $strConsulta3 = "select * from cliente where rut_cliente ='$rut'";
    $buscarpersona3 = mysql_query($strConsulta3);
    $numfilas = mysql_num_rows($buscarpersona3);
    $row = mysql_fetch_assoc($buscarpersona3);
    //$nombre_cliente = $row['nombre_cliente'];

$rut_cliente =$row['rut_cliente'];
  $nombre_cliente = $row['nombre_cliente'];
  $estado =$row['estado'];
 




     ?>
<div class="container">

        <span><h1>Editar Cliente</h1></span>
        <form action="procesaeditarcliente.php" method="GET">

        	<div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Rut</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="rut2" id="rut2"  disabled="disabled" value='<?php echo($rut_cliente);?>'>
        <input type="hidden" class="form-control" id="rut_cliente"
                       name="rut_cliente" value='<?php echo($rut_cliente);?>'>

      </div>
    </div>

      <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Estado</label>
      <div class="col-sm-4">
              <?php 
              if ($estado==1) {

                echo "<div class='alert alert-success' role='alert'>Activo</div>";
                # code...
              }else{
                echo "<div class='alert alert-danger' role='alert'>Deshabilitado</div>";

              }

              ?>
      </div>

    </div>


      <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Cambiar Estado:</label>
      <div class="col-sm-4">
             <button type="submit" class="btn btn-danger" id="boton1" name="boton1" value="deshabilitar"><i class="fa fa-check" aria-hidden="true"></i>Deshabilitar</button>
     <button type="submit" class="btn btn-success" id="boton1" name="boton1" value="habilitar"><i class="fa fa-check" aria-hidden="true"></i>Habilitar</button>
      </div>

    </div><br>



        <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre cliente</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" value='<?php echo($nombre_cliente);?>'>
      </div>
    </div>

      

         <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-4">
        <button type="submit" class="btn btn-success" id="boton1" name="boton1" value="guardar_cambios"><i class="fa fa-check" aria-hidden="true"></i>Guardar Cambios</button>
      </div>
    </div>
    
      <br><br>
    
    
     
    </form> 
    </div>
   	
    </div>
    <br>


    </div>
    <!-- /.container -->

   
</body>
</html>


<!-- Trigger the modal with a button -->



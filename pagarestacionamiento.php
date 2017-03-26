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
    valida_usuario(10);

    $id = $_GET['id'];
	$patente =$_GET['patente'];
	$chofer = $_GET['chofer'];
	$fecha_inicio_2 =$_GET['fecha_inicio_2'];
	$hora_inicio =$_GET['hora_inicio'];
	$fecha_inicio=$_GET['fecha_inicio'];

  $precio =$_GET['precio'];
	// The diff-methods returns a new DateInterval-object...
	$fechahoraactual = date("Y-m-d H:i:s");

// Create two new DateTime-objects...
$date1 = new DateTime($fecha_inicio);
$date2 = new DateTime(date("Y-m-d H:i:s"));

// The diff-methods returns a new DateInterval-object...
$diff = $date2->diff($date1);

// Call the format method on the DateInterval-object
//echo $diff->format('%a Day and %h hours');

$diferenciahoras = $diff->format('%h');
$diferenciaminutos = $diff->format('%m');


$montototal = $precio + ($diferenciahoras * $precio);
	$to_time = strtotime($hora_inicio);
$from_time = strtotime(date("H:i:s"));
//echo round(abs($to_time - $from_time) / 60,2). " minute";


     ?>
<div class="container">

        <span><h1>Pagar estacionamiento vehiculo</h1></span>
        <form action="procesapagarestacionamiento.php" method="GET">

        	<div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Id Estacionamiento</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="id" id="id"  disabled="disabled" value='<?php echo($id);?>'>
        <input type="hidden" class="form-control" id="voucher"
                       name="voucher" value='<?php echo $id;?>'>

      </div>
    </div>

        <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="fecha" id="fecha"  disabled="disabled" value='<?php echo($fecha_inicio_2);?>'>
      </div>
    </div>

       <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Horas Inicio</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="horainicio2" name="horainicio2" disabled="disabled" value='<?php echo($hora_inicio);?>'>

         <input type="hidden" class="form-control" id="horainicio"
                       name ="horainicio" value=<?php echo $hora_inicio;?>>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Horas En Recinto</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="horasdentro" name="horasdentro" disabled="disabled" value='<?php echo($diferenciahoras);?>'>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Monto Total</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="total" name="total" value='<?php echo($montototal);?>'>
      </div>
    </div>

      <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Hora Salida</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="horasalida" name="horasalida" value='<?php echo(date("H:i:s"));?>'>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Chofer:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="chofer" name="chofer" value='<?php echo($chofer);?>'>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Patente</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="patente" name="patente" value='<?php echo($patente);?>'>
      </div>
    </div>

      <button type="submit" class="btn btn-success" id="boton1" name="boton1">Enviar</button>
    </form> 
    </div>
   	
    </div>



    </div>
    <!-- /.container -->

   
</body>
</html>

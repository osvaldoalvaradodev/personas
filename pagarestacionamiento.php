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
  $fecha_termino_2 = date("d-m-Y");

  $fecha_hora_actual = date("Y-m-d H:i:s");
	$hora_inicio =$_GET['hora_inicio'];
	$fecha_inicio=$_GET['fecha_inicio'];

  $precio =$_GET['precio'];
  $rut =$_GET['rut'];
  $id_formato_boleta =$_GET['id_formato_boleta'];
  $rut_cliente =$_GET['rut_cliente'];


  switch ($id_formato_boleta) {
    case '1':
      $str_formato_boleta = "Boleta";
      break;
    
       case '2':
      $str_formato_boleta = "CI";
      break;
    
       case '3':
        $str_formato_boleta = "Convenio";
      break;
    
    default:
       $str_formato_boleta = "Boleta";
      break;
  }
	// The diff-methods returns a new DateInterval-object...
	$fechahoraactual = date("Y-m-d H:i:s");

// Create two new DateTime-objects...
$date1 = new DateTime($fecha_inicio);
$date2 = new DateTime($fecha_hora_actual);

// The diff-methods returns a new DateInterval-object...
$diff = $date2->diff($date1);

// Call the format method on the DateInterval-object
//echo $diff->format('%a Day and %h hours');

$diferenciahoras = $diff->format('%h');
$diferenciaminutos = $diff->format('%m');


//var_dump($fecha_hora_actual,$fecha_inicio);
$diferenciahoras2 =  (strtotime($fecha_hora_actual) - strtotime($fecha_inicio)) / 3600; 

//convierto a decimal para eliminar la aproximacion
$diferenciahoras2 = intval($diferenciahoras2);

$montototal = $precio + ($diferenciahoras2 * $precio);
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
      <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Inicio</label>
      <div class="col-sm-4">
        <input class="form-control" name="fecha_inicio_22" id="fecha_inicio_22"  disabled="disabled" value='<?php echo($fecha_inicio_2);?>'>
      </div>
      <div class="col-sm-4">
        <input type="hidden" class="form-control" name="fecha_inicio_2" id="fecha_inicio_2"   value='<?php echo($fecha_inicio_2);?>'>
      </div>
    </div>

            <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Termino</label>
        <div class="col-sm-4">
        <input disabled="disabled" class="form-control" name="fecha_termino_22" id="fecha_termino_22"   value='<?php echo($fecha_termino_2);?>'>
      </div>
      <div class="col-sm-4">
        <input type="hidden" class="form-control" name="fecha_termino_2" id="fecha_termino_2"   value='<?php echo($fecha_termino_2);?>'>
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
        <input type="text" class="form-control" id="horasdentro" name="horasdentro" disabled="disabled" value='<?php echo($diferenciahoras2);?>'>
      </div>
    </div>

      <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Forma de pago:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="id_formato_boleta" name="id_formato_boleta" disabled="disabled" value='<?php echo($str_formato_boleta);?>'>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label" >Monto Total</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="total2" disabled="disabled" name="total2" value='<?php echo($montototal);?>'>

        <input type="hidden" class="form-control" id="total" name="total" value='<?php echo($montototal);?>'>
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
      <label for="inputEmail3" class="col-sm-2 col-form-label">Rut</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="rut" name="rut" value='<?php echo($rut);?>'>
      </div>
    </div>



    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Patente</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="patente" name="patente" value='<?php echo($patente);?>'>
      </div>
    </div>


    <?php 
    if ($rut_cliente != 0) {
    include_once("conexion.php");
    $con = new DB;
    $buscarpersona2 = $con->conectar();

    //echo $rut_cliente;
    $strConsulta2 = "select * from cliente where rut_cliente ='$rut_cliente'";
    $buscarpersona2 = mysql_query($strConsulta2);
    $numfilas = mysql_num_rows($buscarpersona2);
    $row = mysql_fetch_assoc($buscarpersona2);
    $nombre_cliente = $row['nombre_cliente'];
    //var_dump($numfilas);
    
  

    
     ?>
          <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre Cliente:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" disabled="disabled" value='<?php echo($nombre_cliente);?>'>
      </div>
    </div>
     <?php } ?>
  

      <div class="form-group row">
      <div class="col-sm-4">
        <input type="hidden" class="form-control" id="rut_cliente" name="rut_cliente" value='<?php echo($rut_cliente);?>'>
      </div>
    </div>

      <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Correlativo Papel:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="correlativo_papel" name="correlativo_papel">
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

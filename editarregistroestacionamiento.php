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

    $id = $_GET['id'];
	


  
	// The diff-methods returns a new DateInterval-object...
	$fechahoraactual = date("Y-m-d H:i:s");

 include_once("conexion.php");



$con2 = new DB;
    $buscarpersona3 = $con2->conectar();

    //echo $rut_cliente;
    $strConsulta3 = "select *,DATE_FORMAT(ingreso_vehiculos.fecha_inicio, '%d-%m-%Y') as fecha_inicio_2,DATE_FORMAT(ingreso_vehiculos.fecha_termino, '%d-%m-%Y') as fecha_termino_2 from ingreso_vehiculos where id ='$id'";
    $buscarpersona3 = mysql_query($strConsulta3);
    $numfilas = mysql_num_rows($buscarpersona3);
    $row = mysql_fetch_assoc($buscarpersona3);
    //$nombre_cliente = $row['nombre_cliente'];

$patente =$row['patente'];
  $chofer = $row['chofer'];
  $fecha_inicio_2 =$row['fecha_inicio_2'];
  $hora_inicio =$row['hora_inicio'];
  $fecha_inicio=$row['fecha_inicio'];
  $estado = $row['estado'];
  $hora_termino = $row['hora_termino'];
 $monto = $row['monto'];
   $id_tipo = $row['id_tipo'];
  $rut =$row['rut'];
  $id_formato_boleta =$row['id_formato_boleta'];
  $rut_cliente =$row['rut_cliente'];
  $correlativo_papel =$row['correlativo_papel'];
  $pagado=$row['pagado'];

  $hora_termino = $row['hora_termino'];
  $fecha_termino = $row['fecha_termino_2'];





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
           case '4':
        $str_formato_boleta = "Exentos";
      break;
    
    default:
       $str_formato_boleta = "Boleta";
      break;
  }


// Create two new DateTime-objects...
$date1 = new DateTime($fecha_inicio);
$date2 = new DateTime(date("Y-m-d H:i:s"));

// The diff-methods returns a new DateInterval-object...
$diff = $date2->diff($date1);

// Call the format method on the DateInterval-object
//echo $diff->format('%a Day and %h hours');

$diferenciahoras = $diff->format('%h');
$diferenciaminutos = $diff->format('%m');


$montototal = $monto;
  $to_time = strtotime($hora_inicio);
$from_time = strtotime(date("H:i:s"));
//echo round(abs($to_time - $from_time) / 60,2). " minute";

     ?>
<div class="container">

        <span><h1>Modificar Registro de vehiculo</h1></span>
        <form action="procesaactualizarestacionamiento.php" method="GET">

        	<div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Id Estacionamiento</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="id2" id="id2"  disabled="disabled" value='<?php echo($id);?>'>
        <input type="hidden" class="form-control" id="id"
                       name="id" value='<?php echo $id;?>'>

      </div>
    </div>

      <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Estado</label>
      <div class="col-sm-4">
              <?php 
              if ($estado==1) {

                echo "<div class='alert alert-success' role='alert'>Voucher Activo</div>";
                # code...
              }else{
                echo "<div class='alert alert-danger' role='alert'>Voucher Nulo</div>";

              }

              ?>
      </div>
    </div>



        <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Ingreso</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="fecha" id="fecha" value='<?php echo($fecha_inicio_2);?>'>
      </div>
    </div>

       <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Hora Ingreso</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="horainicio" name="horainicio" value='<?php echo($hora_inicio);?>'>

       
      </div>
    </div>

       <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Hora Salida</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="horasalida" name="horasalida" value='<?php echo $hora_termino?>'>
      </div>
    </div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha Salida</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="fechatermino" name="fechatermino" value='<?php echo $fecha_termino;?>'>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Horas En Recinto</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="horasdentro" name="horasdentro" value='<?php echo($diferenciahoras);?>'>
      </div>
    </div>

      

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label" >Monto Total</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="total" name="total" value='<?php echo($montototal);?>'>

       
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
   
    $con = new DB;
    $buscarpersona2 = $con->conectar();

    //echo $rut_cliente;
    $strConsulta2 = "select * from cliente where rut_cliente ='$rut_cliente'";
    $buscarpersona2 = mysql_query($strConsulta2);
    $numfilas = mysql_num_rows($buscarpersona2);
    $row = mysql_fetch_assoc($buscarpersona2);
    $nombre_cliente = $row['nombre_cliente'];
    $rut_cliente = $row['rut_cliente'];
    //var_dump($numfilas);
    
    }else{
         $nombre_cliente = "Sin Cliente";
    $rut_cliente = 0;

    }

    
     ?>


     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Cliente: </label>
      <div class="col-sm-4">
        <select class="form-control" id='rut_cliente' name='rut_cliente'>
             <option value="<?php echo $rut_cliente?>"><?php echo $nombre_cliente?></option>
        


             <?php 

             $strConsultaCliente = "select * from cliente where cliente.estado =1";
             $buscarcliente = $con2->conectar();
              $buscarcliente = mysql_query($strConsultaCliente);
              $numregistrosClientes = mysql_num_rows($buscarcliente);
              for ($i=0; $i<$numregistrosClientes; $i++)
              {
              $fila = mysql_fetch_array($buscarcliente);
              $rut_cliente = $fila['rut_cliente'];
              $nombre_cliente = $fila['nombre_cliente'];

              echo "<option value='$rut_cliente'>$nombre_cliente</option>";
              
              }
             ?>
             

           
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Estado Pago </label>
      <div class="col-sm-4">
        <select class="form-control" id='pagado' name='pagado'>
             <option value="<?php echo $pagado?>"><?php if ($pagado==1) {
              echo "Pagado";    
             }
             else{
              echo "No Pagado";
             }

             ?></option>
             <option value='0'>Pagado</option>
              <option value='1'>No Pagado</option>
        </select>
        </div>
    </div>



  <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de Registro</label>
      <div class="col-sm-4">
     <select class="form-control" id='id_formato_boleta' name='id_formato_boleta'>
             <option value="<?php echo $id_formato_boleta?>"><?php echo $str_formato_boleta;?></option>
            <option value="1">Boleta</option>
             <option value="2">CI</option>
             <option value="3">Convenio</option>
             <option value="4">Exentos</option>
                       </select>
        </div>
    </div>
  
  

      
      <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Correlativo Papel:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="correlativo_papel" name="correlativo_papel" value='<?php echo($correlativo_papel);?>'>
      </div>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">                   </label>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3"><i class="fa fa-check" aria-hidden="true"></i>Habilitar Registro</button>
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal2"><i class="fa fa-ban" aria-hidden="true"></i>Anular Registro</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-ban" aria-hidden="true"></i>Eliminar Registro</button>
      <button type="submit" class="btn btn-success" id="boton1" name="boton1"><i class="fa fa-check" aria-hidden="true"></i>Guardar Cambios</button>
    </form> 
    </div>
   	
    </div>
    <br>


    </div>
    <!-- /.container -->

   
</body>
</html>


<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Esta Seguro que desea eliminar este Registro?</h4>
      </div>
      <div class="modal-body">
        <p>¿Desea Eliminar Este Registro?</p>
      </div>
      <div class="modal-footer">
      <a <?php echo "href='procesaeliminarestacionamiento.php?id=$id'";?> class="btn btn-danger" role="button">Eliminar Registro</a>
    
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Esta Seguro que desea Anular este Registro?</h4>
      </div>
      <div class="modal-body">
        <p>¿Desea Anular Este Registro?</p>
      </div>
      <div class="modal-footer">
      <a <?php echo "href='procesaanularestacionamiento.php?id=$id&estado=0'";?> class="btn btn-danger" role="button">Anular Registro</a>
    
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>

<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Esta Seguro que desea Habilitar este Registro?</h4>
      </div>
      <div class="modal-body">
        <p>¿Desea Habilitar Este Registro?</p>
      </div>
      <div class="modal-footer">
      <a <?php echo "href='procesaanularestacionamiento.php?id=$id&estado=1'";?> class="btn btn-primary" role="button">Habilitar</a>
    
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>
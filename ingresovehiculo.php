
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
    <div class="container">

        <span><h1>Ingrese los datos del vehiculo:</h1></span>
        <form action="procesaringresovehiculo.php" method="POST">
        <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="fecha" id="fecha" value='<?php echo(date("d-m-Y"));?>'>
      </div>
    </div>

       <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Hora Inicio</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="horainicio" name="horainicio" value='<?php echo(date("H:i:s"));?>'>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre Chofer:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="chofer" name="chofer">
      </div>
    </div>


    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Rut</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="rut" name="rut">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Patente</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="patente" name="patente">
      </div>
    </div>


    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo Vehiculo</label>
      <div class="col-sm-4">
        <select class="form-control" id='tipovehiculo' name='tipovehiculo'>
             <option value="1">Camiones $500</option>
             <option value="2">Rampla $500</option>
             <option value="3">Maquinaria $500</option>
             <option value="4">Vehiculos Menores $200</option>
            <option value="5">Exento y Visitas</option>
        </select>
      </div>
    </div>


      <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Forma de pago</label>
      <div class="col-sm-4">
        <select class="form-control" id='formapago' name='formapago'>
             <option value="1">Boleta</option>
             <option value="2">CI</option>
             <option value="3">Convenio</option>
             <option value="4">Exentos</option>
        </select>
      </div>
    </div>

        <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Cliente</label>
      <div class="col-sm-4">
        <select class="form-control" id='rutcliente' name='rutcliente'>
          <option value='0'>Sin Cliente</option>
              <?php 
               include_once("conexion.php");



            $con2 = new DB;
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

      <button type="submit" class="btn btn-success" id="boton1" name="boton1">Enviar</button>
    </form> 
    </div>
   


    

            

    </div>
    <!-- /.container -->

   

   
</body>
</html>

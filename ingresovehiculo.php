
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
      <label for="inputEmail3" class="col-sm-2 col-form-label">Chofer:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="chofer" name="chofer">
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

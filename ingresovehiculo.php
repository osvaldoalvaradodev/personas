
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
             <option value="0">Sin Cliente</option>
             <option value='14424190'>Dagoberto Turra Yanez</option>
              <option value='96627500'>Danisco Chile Sa</option>
              <option value='5374148'>Henrique Escala Gonzalez</option>
              <option value='7852371'>Fernando Ampuero Pacheco</option>
              <option value='76594830'>Transportes Soto y Marin</option>
              <option value='7173911'>Luis Seron Vera</option>
              <option value='8577270'>Luis Lizama Almonacid</option>
              <option value='11310101'>Manuel Soto Villaroel</option>
              <option value='8756011'>Monica Meneses Uribe</option>
              <option value='6686732'>Nelson Gallardo Gallardo</option>
              <option value='8915293'>Oscar Oyarzun Velasquez</option>
              <option value='10359368'>Pedro Ulloa Sanches</option>
              <option value='76472531'>Quinchao Cargo Limitada</option>
              <option value='10827987'>Santiago Cadin</option>
              <option value='16047220'>Sebastian Nunez Gonzalez</option>
              <option value='76384120'>Sociedad Efrain Andrade e Hijos</option>
              <option value='89042600'>Sociedad Agromar Limitda</option>
              <option value='76422357'>Sociedad de Inversiones Isla Guafo</option>
              <option value='76194520'>Sociedad Proa Limitada</option>
              <option value='8210971'>Orieta Bahamonde Oyarzun</option>

           
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

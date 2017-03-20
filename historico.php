<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
<?php 


//nivel minimo de acceso para poder iniciar este mantenedor, pagina etc
valida_usuario(98);


?>


  <div class="col-xs-3"></div>
   <div class="col-xs-3">
   
     
                    <form action="procesahistorico.php" method="GET">
              <div class="form-group">
              <p> </p>
                <label for="ejemplo_email_1">Ingrese La fecha A Consultar : </label>


                <input type="text" class="form-control" id="fecha" name="fecha" placeholder="dd/mm/aaaa">

                <label for="ejemplo_email_1">Rut: (* todos) </label>


                <input type="text" class="form-control" id="rut" name="rut" value="*">
                    
                                   <label for="exampleSelect1">Tipo</label>
                  <select class="form-control" id="tipo" name="tipo">
                    <option value="3">Ingresos y Salidas</option>
                    <option value="1">Ingreso</option>
                    <option value="0">Salidas</option>

                  </select>

              </div>


              <button type="submit" class="btn btn-default">Consultar</button>
    </form>



    </div>
      <div class="col-xs-3"></div>
    
    <!-- /.container -->

  
</body>
</html>
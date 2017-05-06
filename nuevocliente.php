
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
    <div class="container">
<?php 
valida_usuario(90);
?>

                    <form action="procesanuevocliente.php" method="POST">
                           <div class="form-group">
              
                            <p>Ingrese los datos del nuevo cliente a continuacion:</p>
                 
                                <div class="col-xs-4">
                                <label for="rut">Rut</label>
                                 <input type="text" class="form-control" id="rut"
                         name ="rut" placeholder="17123123">

                                    <label for="rut">Nombre Cliente</label>
                                  <input type="text" class="form-control" id="nombre"
                         name ="nombre" placeholder="nombre...">

                                  <br>
                             <label for="boton1"></label>
                           <button type="submit" class="btn btn-default" id="boton1" name="boton1">Crear Cliente</button>
                             </div>

          
                             <div class="col-xs-4">
                   
                            </div>
                </div>  
               </form> 
            </div>
   


    

            

    </div>
    <!-- /.container -->

   

   
</body>
</html>

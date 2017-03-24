
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
    <div class="container">


                    <form action="procesaringreso.php" method="POST">
              <div class="form-group">
            
              <p>Ingrese el rut de la persona a continuacion:</p>
                <div>
                
                </div>
                  <div class="col-xs-4">
                   <label for="rut">Rut</label>
                <input type="text" class="form-control" id="rut"
                       name ="rut" placeholder="17123123">


<label for="boton1"></label>
                         <button type="submit" class="btn btn-default" id="boton1" name="boton1">Enviar</button>
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

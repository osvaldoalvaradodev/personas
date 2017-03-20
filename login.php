<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
    <div class="container">
    <?php
    
     if(isset($_SESSION["error"])){
      echo $_SESSION["error"];

     unset($_SESSION["error"]);


     }?>



     <div class="panel panel-primary">
  <div class="panel-heading"><b>Ingrese sus credenciales para iniciar sesion:</b></div>
  <div class="panel-body">
          
                    <form class="form-inline" action="procesalogin.php" method="POST">
              <div class="form-group">
              
                <label for="ejemplo_email_1">Usuario:</label>
                <input type="text" class="form-control" id="username"
                       name ="username" placeholder="usuario">
                        </div> 
                          <br><br>
                        <div class="form-group">
                    <label for="ejemplo_email_1">Clave: </label>      
                 <input type="password" class="form-control" id="password"
                       name ="password" placeholder="123456">      
                 </div> 
                 <br>
                 <br>
              <button type="submit" class="btn btn-primary">Enviar</button>
          </form>



  </div>
</div>





            

    </div>
    <!-- /.container -->

</body>
</html>

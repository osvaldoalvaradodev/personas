

<?php
session_start();
 include('header.php');?>
<body>
<?php include('navbar.php');?>

<?php 
valida_usuario(98);
?>


 


    <div class="well">
    <form class="form-inline" action="editarregistroestacionamiento.php" method="GET">
  <div class="form-group">
    <label for="email">Id Ticket a Modificar</label>
    <input type="text" class="form-control" id="id" name="id">
  </div>
  

  <button type="submit" class="btn btn-default">Buscar</button>
</form>

    </div>
    <!-- /.container -->

   
</body>
</html>

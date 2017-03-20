<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>

    <!-- Page Content -->
    <div class="container">
        <?php 
        session_destroy();
        echo "<div class='alert alert-success'><strong>Sesion Cerrada con Exito</strong></div>";

        ?>


    </div>
 
</body>
</html>
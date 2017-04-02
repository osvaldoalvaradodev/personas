 
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
<?php 
valida_usuario(11);
?>
    

      <div class="col-xs-3"></div>
       
          <div class="col-xs-3">
   
       <div class="alert alert-danger">
            <strong>Usuario no existe</strong> Porfavor ingrese los datos para crearlo
          </div>
                    <form action="procesarusuario.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
              <p>Ingrese los datos del nuevo usuario a continuacion: </p>
                <label for="ejemplo_email_1">Rut</label>

               <?php 
               if (isset($_SESSION['rutnuevousuario'])){
               	echo "<input type='text' class='form-control' id='rut' name='rut' placeholder='17123123' value='".$_SESSION['rutnuevousuario']."'>";
               }
               else{
               		echo "<input type='text' class='form-control' id='rut' name='rut' placeholder='17123123'>";
               }
               ?>

         

                
               
                        <label for="ejemplo_email_1">Nombres:</label>
                <input type="text" class="form-control" id="nombres"
                       name ="nombres" placeholder="Juan">

                 
                       
                       


                        <label for="ejemplo_email_1">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos"
                       name ="apellidos" placeholder="Perez">


                             <label for="ejemplo_email_1">Direccion</label>
                <input type="text" class="form-control" id="direccion"
                       name ="direccion" placeholder="direccion...">

                        <label for="ejemplo_email_1">Email</label>
                <input type="text" class="form-control" id="mail"
                       name ="mail" placeholder="contacto@gmail.com">
                        <label for="ejemplo_email_1">Telefono</label>
                <input type="text" class="form-control" id="telefono"
                       name ="telefono" placeholder="978946589">
                       
                          <label for="ejemplo_email_1">Observaciones (Patente Vehiculo, Embarcacion, etc)</label>
                <input type="text" class="form-control" id="notas"
                       name ="notas" placeholder="CZ-AB-12">



                       <?php 
                        include_once("conexion.php");
                        $strConsulta = "select * from area";
                        $con = new DB;
                        $buscarregistros = $con->conectar();
                        $buscarregistros = mysql_query($strConsulta);
                        $numregistros = mysql_num_rows($buscarregistros);


                        ?>


                        <div class="form-group">
                        <label  class="control-label" for="estado">Area:</label>
                       
                        <select class="form-control" id="area" name="area">
                      
                        <?php
                        for ($i=0; $i<$numregistros; $i++)
                                {
                                $fila = mysql_fetch_array($buscarregistros);
                                $numlista = $i + 1;

                                echo "<option value ='".$fila['id']."'>".utf8_encode($fila['nombre'])."</option>";
                                }
                       ?>
                         
                        
                        </select>
                        </div>
                       
                                <!-- Para que funcione el file upload el formulario debe inclouir las propiedades para media type-->
                                  <div class="form-group">
                                                <label class="control-label" for="nombre" >Subir Imagen:</label>   
                                             
                                        <input class="btn btn-success" type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                                              

                      


              </div>

             

              <button type="submit" class="btn btn-default">Guardar</button>
 <br><br><br>
    </form>

        
    </div>
        <div class="col-xs-3"></div>


</body>
</html>
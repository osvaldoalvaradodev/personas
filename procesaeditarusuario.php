<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">





<?php

 include('header.php');?>
<body>
<?php include('navbar.php');?>

<?php 

valida_usuario(98);

?>




    <?php
     include_once("conexion.php");
    // var_dump($_POST);
   

$varRut = $_GET['rut'];
$varNombre = $_GET['nombre'];
$varApellido = $_GET['apellido'];
$varTelefono = $_GET['telefono'];
$varDireccion = $_GET['direccion'];
$varEmail = $_GET['email'];
$varEstado =  $_GET['estado'];
$varArea = $_GET['id_area'];
$varNotas = $_GET['notas'];
?>


<br>
<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading"><b>Editando al Usuario 

      <span class="badge badge-danger">
  <?php echo $varNombre." ".$varApellido;?></span></b></div>

     <div class="panel-body">
     



     
            <form action="procesaactualizarusuario.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
              <div class="form-group">
              
                <h2>
                <span class="label label-primary col-sm-5"> Rut: <?php echo $varRut;?></span>
                </h2>
        
                <input type="hidden" class="form-control" id="rutoculto"
                       name ="rutoculto" value='<?php echo $varRut;?>'>
                        </div>

                         <div class="form-group">
                           <label class="control-label col-sm-2" for="nombre" >Fotografia:</label>   
                        <div class="col-sm-10">
            <?php
            $nombre_fichero = 'fotos/'.$varRut.'.jpg';

            if (file_exists($nombre_fichero)) {
               

                echo "<img class='img-rounded' src='".$nombre_fichero."' height='240' width='350'>";
            } else {
                echo "<img  class='img-rounded' src='fotos/sinfoto.jpg' height='240' width='350'>";
            }
            ?>

               </div>
               </div>

                <div class="form-group">
                           <label class="control-label col-sm-2" for="nombre" >Subir Imagen:</label>   
                        <div class="col-sm-10">
                  <input class="btn btn-success" type="file" name="fileToUpload" id="fileToUpload">
              </div></div>
                
           


            <br>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre" >Nombre</label>      
                <div class="col-sm-5">
                 <input type="text" class="form-control" id="nombre"
                       name ="nombre" value =<?php echo $varNombre;?>>
                       </div>    
                </div>
                   <div class="form-group">
                  <label  class="control-label col-sm-2" for="apellido">Apellido</label> 
                   <div class="col-sm-5">     
                 <input type="text" class="form-control" id="apellido"
                       name ="apellido" value =<?php echo $varApellido;?>></div>
                         </div>

                           <div class="form-group">
                       <label class="control-label col-sm-2" for="ejemplo_email_1">Telefono</label>  
                         <div class="col-sm-5">     
                 <input type="text" class="form-control" id="telefono"
                       name ="telefono" value =<?php echo $varTelefono;?>></div>
                       </div>    


                          <div class="form-group">
                       <label class="control-label col-sm-2" for="ejemplo_email_1">Direccion</label>
                         <div class="col-sm-5">       
                 <input type="text" class="form-control" id="direccion"
                       name ="direccion" value =<?php echo $varDireccion;?>>  </div>      
                        </div>

                             <div class="form-group">
                        <label class="control-label col-sm-2" for="ejemplo_email_1">Email</label>  
                           <div class="col-sm-5">     
                 <input type="text" class="form-control" id="email"
                       name ="email" value =<?php echo $varEmail;?>> 
                        </div>
                         </div>


                                <div class="form-group">
                        <label class="control-label col-sm-2" for="ejemplo_email_1">Observaciones (Patente,Embarcación,Etc)</label>  
                           <div class="col-sm-5">     
                 <input type="text" class="form-control" id="notas"
                       name ="notas" value =<?php echo $varNotas;?>> 
                        </div>
                         </div>



                      <div class="form-group">

                       <label class="control-label col-sm-2" for="cajonestado">Estado Actual:</label> 
                          <div class="col-sm-5" id="cajonestado">  
               
                      <h3>
                       <?php 
                       if ($varEstado=='1'){


                      echo '<span class="label label-success">Activo</span>';  
                      }
                      else{
                          echo '<span class="label label-danger">Inactivo</span>';
                      }

                           ?>
                       
                     </h3>
                          </div>
                          </div>


                        <?php 
                        
                        
                        ?>

                        
            <div class="form-group">
            <label  class="control-label col-sm-2" for="estado">Actualizar Estado:</label>
            <div class="col-sm-5">  
            <select class="form-control" id="estado" name="estado">
              <option <?php if ($varEstado == 1) echo 'selected ' ;?> value='1'>Habilitar</option>
              <option <?php if ($varEstado == 0) echo 'selected '?> value='0'>Desabilitar</option>
             
            </select>
            </div>
            </div>


                  <?php 
                    include_once("conexion.php");
                        $strConsulta = "select * from area";
                        $con = new DB;
                        $buscarregistros = $con->conectar();
                     $buscarregistros = mysql_query($strConsulta);
                     $numregistros = mysql_num_rows($buscarregistros);
                  ?>


                        <div class="form-group">
                        <label  class="control-label col-sm-2" for="estado">Area:</label>
                         <div class="col-sm-5">
                        <select class="form-control" id="area" name="area">
                        
                        <?php
                        for ($i=0; $i<$numregistros; $i++)
                                {
                                $fila = mysql_fetch_array($buscarregistros);
                                $numlista = $i + 1;
                                echo "<option ";
                                if ($fila['id'] == $varArea ) echo 'selected ' ;
                                echo "value ='".$fila['id']."'>".utf8_encode($fila['nombre'])."</option>";
                                }

                       ?>
                         
                        
                        </select>
                        </div>
                        </div>


                 <div class="form-group">
                 <label  class="control-label col-sm-2" for="nohacenada"></label>
                 <div class="col-sm-9"> 
             <button type="submit" class="btn btn-success">Guardar Cambios</button>
             </div>
             </div>
         

              </div>   

             
    </form>

     </div>
  </div>


 
  </div>


<?php

/*
*/
     ?>



  
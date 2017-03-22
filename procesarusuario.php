<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
    <div class="container">
    <?php

    




     include_once("conexion.php");
     try {
    // var_dump($_POST);
     $rut = $_POST['rut'];
     $nombres = $_POST['nombres'];
     $apellidos = $_POST['apellidos'];
     $mail = $_POST['mail'];
      $telefono = $_POST['telefono'];
      $direccion =$_POST['direccion'];
       $area =$_POST['area'];
       $varRut = $rut;
      $varNotas = $_POST['notas'];
    
    
    try{
        //echo ("Se actualizara la imagen");
         $target_dir = "fotos/";

            //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            $target_file = $target_dir . $varRut . ".jpg";
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

                    if ($uploadOk == 0) {
                        echo "Perdon, el archivo no se ha podido subir";
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "<div class='alert alert-success'><strong>El Archivo ". basename( $_FILES["fileToUpload"]["name"]). " Se Subio Correctamente</strong></div>";
                        } else {
                            //echo "Existe un error al subir el archivo";
                        }
                    }
    
    } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }

    $con = new DB;
    $crearpersona = $con->conectar();
    $strConsulta = "INSERT INTO `personas` (`rut`, `nombre`, `apellido`,`email`,`telefono`,`direccion`,`id_area`,`notas`) VALUES ('$rut', '$nombres', '$apellidos','$mail','$telefono','$direccion','$area','$varNotas');";
    //echo $strConsulta;

   $crearpersona = mysql_query($strConsulta);
        
        if($crearpersona)
        {
              //print_r($_FILES);
    echo("<div class='alert alert-success'><strong>Usuario Creado Con exito!</strong></div>");
    echo("<a href='editarusuarios.php' class='btn btn-info' role='button'>
        <span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span>
        Volver al Listado de Usuarios</a>");

        }
        else
        {
         echo("<div class='alert alert-danger'><strong>No se pudo crear el usuario</strong></div>");

        }


  

    } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }


    

     ?>


    </div>
    <!-- /.container -->

 
</body>
</html>
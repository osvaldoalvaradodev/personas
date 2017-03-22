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



    $varRut = $_POST['rut'];
$varNombre = $_POST['nombre'];
$varApellido = $_POST['apellido'];
$varTelefono = $_POST['telefono'];
$varDireccion = $_POST['direccion'];
$varEmail = $_POST['email'];
$varEstado =  $_POST['estado'];
$varNotas = $_POST['notas'];
$varArea = $_POST['area'];

    $con = new DB;
    $crearpersona = $con->conectar();
    $strConsulta = "update `personas` set `nombre` = '$varNombre', `apellido` = '$varApellido',`email` = '$varEmail',`telefono` = '$varTelefono',`direccion` ='$varDireccion',`estado` = '$varEstado',`notas` = '$varNotas',`id_area` = '$varArea' where `rut` = $varRut;";
    $crearpersona = mysql_query($strConsulta);
    


    

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
    

               





    //echo $strConsulta;
    echo("<div class='alert alert-success'><strong>Usuario Actualizado con exito!</strong></div>");

    echo("<a href='editarusuarios.php' class='btn btn-info' role='button'><span class='glyphicon glyphicon-arrow-left'></span>  Volver</a>");
    } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }


     ?>


    </div>
    <!-- /.container -->

</body>
</html>
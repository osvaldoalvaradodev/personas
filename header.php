    <?php date_default_timezone_set('America/Santiago');?>

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Contador de Personas<?php echo(" ".date("d-m-Y"));?></title>

    <!-- Bootstrap Core CSS -->
 <script src="js/jquery.js"></script>


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
  
  


<script type="text/javascript">
    $(function() {
        $.mask.definitions['~'] = "[+-]";
        $("#fecha").mask("99/99/9999",{completed:function(){alert("Fecha Correcta");}});
        
        
        $("#rut").mask("99999999");
        $("#telefono").mask("999999999");


        /*
        $("#phoneExt").mask("(999) 999-9999? x99999");
        $("#iphone").mask("+33 999 999 999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
        $("#product").mask("a*-999-a999", { placeholder: " " });
        $("#eyescript").mask("~9.99 ~9.99 999");
        $("#po").mask("PO: aaa-999-***");
        $("#pct").mask("99%");

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });

        */
    });
    
</script>

 
             <script type="text/javascript">
             //valida que se pueda ingresar solo texto en un textbox y espacios
  $(document).ready(function() {
      $('#nombres,#apellidos').keypress(function(key) {

          if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 45) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
 
                )
                return false;

      });
      /*
      $('#apellidos').keypress(function(key) {
          if(key.charCode < 97 || key.charCode > 122) return false;
      });*/
  });
  </script>



    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
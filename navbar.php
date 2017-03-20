    <?php              

                                //funcion para redireccionar
                             function redirect($url)
                        {
                            if (!headers_sent())
                            {    
                                header('Location: '.$url);
                                exit;
                                }
                            else
                                {  
                                echo '<script type="text/javascript">';
                                echo 'window.location.href="'.$url.'";';
                                echo '</script>';
                                echo '<noscript>';
                                echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                                echo '</noscript>'; exit;
                            }
                        }

                          
                                //funcion para validar el usuario
                             function valida_usuario($nivelacceso)
                             {

                                //Los niveles de acceso seran ascendentes el super administrador
                                //tiene nivel de acceso 99
                                //por lo tanto al llamar a valida_usuario
                                //El usuario debera tener privilegios sobre eso para poder pasar
                        

                                  if ((  $_SESSION["nivelusuario"] < $nivelacceso )){

                                   // echo "asdasd";

                                //header("Location: login.php");
                                    redirect('login.php');
                                    }
                             }

                             function ocultar_elemento($nivelacceso){

                                if(isset($_SESSION["nivelusuario"])){
                                    if (  $_SESSION["nivelusuario"] < $nivelacceso ){
                                        echo "hide";
                                }
                                else {
                                        echo "show";
                                }
                                }
                                else{
                                    echo "hide";
                                }                                                
                            

                             }


                                                             
                            

                             
                             ?>
    
    
    
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="#">inicio</a>-->

                 <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-time"></span><?php echo(date("H:i:s"));?>
                    <span class="glyphicon glyphicon-calendar"></span>
                 <?php echo(" ".date("d-m-Y"));?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                      <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  Ingresos<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a href="index.php">Registrar Ingreso</a></li>
                                  <li><a href="agregarsalida.php">Registrar Salida</a></li>
                                 </ul>
                            </li>




              
                        

                        <li class="dropdown <?php ocultar_elemento(98);?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  Reportes<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a href="resumendiario.php">Resumen Hoy</a></li>
                                  <li><a href="historico.php">Historico por Dia</a></li>
                                 </ul>
                            </li>





                            <li class="dropdown <?php ocultar_elemento(98);?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  Usuarios <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a href="agregarusuario.php">Agregar Nuevo Usuario</a></li>
                                  <li><a href="editarusuarios.php">Editar Usuarios Existentes</a></li>
                                 </ul>
                            </li>

                                                               
                      


                 
                </ul>






                         <ul class="nav navbar-nav navbar-right">
                         <li><a href="javascript:window.print(); void 0;"><span class="glyphicon glyphicon-print"></span> Imprimir</a></li>



                         <?php 


                                if(isset($_SESSION["usuarioautentificado"])){
                             

                                                    echo(" <li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span>Cerrar Sesion</a></li>
                                </ul>");
                               
                                }
                                else{    

                       
                                       echo("<li><a href='login.php'><span class='glyphicon glyphicon-user'></span>Iniciar Sesion</a></li>");
                                }

                         ?>
                        


                        
                </div>

         
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>

    
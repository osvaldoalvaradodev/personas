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


                             function transforma_fecha_guardar($fechaSTR){
                              /*
                                Transforma fecha para poder dejarla en 
                                formato date, asi guardarla
                                  
                                recive dd/mm/YYYY
                              */
                                list($d,$m,$y) = explode("/",$fechaSTR);
                                $timestamp = mktime(0,0,0,$m,$d,$y);
                               $fechaFormateada = date("Y-m-d",$timestamp);
                                return $fechaFormateada;
                             }


                            function transforma_fecha_hora_guardar($fechaSTR,$horaString){
                              /*
                                Transforma fecha para poder dejarla en 
                                formato date, recibe
                                recive dd/mm/YYYY hh:mm:ss
                              */
                                list($hora,$minuto,$segundo) = explode(":",$horaString);

                                list($d,$m,$y) = explode("/",$fechaSTR);
                                $timestamp = mktime($hora,$minuto,$segundo,$m,$d,$y);
                               $fechaFormateada = date("Y-m-d H:i:s",$timestamp);
                                return $fechaFormateada;
                             }

                             function debug_query($strQuery){

                        

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

                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                      <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  Menu<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">

                                  <li><a href="index.php">Inicio</a></li>
                                  <li class="<?php ocultar_elemento(10);?>"><a href="agregaringreso.php">Registrar Ingreso Personas</a></li>
                                  <li class="<?php ocultar_elemento(10);?>"><a href="agregarsalida.php">Registrar Salida Personas</a></li>
                                   <li class="<?php ocultar_elemento(10);?>"><a href="ingresovehiculo.php">Registrar Ingreso Vehiculo</a></li>
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
                                 Personas <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a href="agregarusuario.php">Agregar Nueva persona</a></li>
                                  <li><a href="editarusuarios.php">Editar Personas Existentes</a></li>
                                 </ul>
                            </li>

                               <li class="dropdown <?php ocultar_elemento(10);?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  Vehiculos<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a href="listadoestacionados.php">Listado Vehiculos Actuales</a></li>
                                        <li><a href="listadoestacionadosdeuda.php">Listado Vehiculos con Deuda</a></li>

                                  <li class="<?php ocultar_elemento(99);?>"><a href="reporteci.php">Reporte CI (Factura)</a></li>
                                  <li  class="<?php ocultar_elemento(99);?>"><a href="reporteconvenio.php">Reporte Convenio</a></li>
                                  <li  class="<?php ocultar_elemento(99);?>"><a href="buscarticket.php">Buscar Ticket por ID</a></li>

                                  <li  class="<?php ocultar_elemento(99);?>"><a href="nuevocliente.php">Nuevo CLiente CI</a></li>
                                   <li  class="<?php ocultar_elemento(99);?>"><a href="listadoclientes.php">Listado Clientes CI</a></li>
                                 </ul>
                            </li>

                                                               
                      


                 
                </ul>




                <ul class="nav navbar-nav navbar-right">
                  <!--
                  Boton para imprimir oculto
                                            <li><a href="javascript:window.print(); void 0;"><span class="glyphicon glyphicon-print"></span> Imprimir</a></li>-->



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

    
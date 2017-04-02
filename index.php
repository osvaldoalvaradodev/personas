
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<?php include('navbar.php');?>
    <!-- Page Content -->
    <div class="container">

      <div class="panel panel-success">
  <div class="panel-heading">    <h1>Bienvenido al sistema de control Puerto Quellón
<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></h1></div>
  <div class="panel-body">
    <p><h3>Funciones:</h3></p>
    <p>- Contabilizar Ingresos y salidas de Personas.</p>
    <p>- Visualizar en tiempo real la cantidad de personal al interior del resinto.</p>
    <p>- Emitir reportes diarios.</p>
    <br>
    <br>


     <!--
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Registrar Ingreso</button>

    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2">Registrar Salida</button><br>

     -->
    <span>Realizado bajo licencia GPL con ♥ en Chiloe<span>
  </div>

</div>
           
            </div>





    </form>


    

            

    </div>
    <!-- /.container -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Ingreso</h4>
      </div>
      <div class="modal-body">
          

                    <form action="procesaringreso.php" method="POST">
              <div class="form-group">
            
              <p>Ingrese el rut de la persona a continuacion:</p>
                <div>
                
                </div>
                  <div class="col-xs-4">
                   <label for="rut">Rut</label>
                <input type="text" class="form-control" id="rut"
                       name ="rut" placeholder="17123123">


<label for="boton1"></label><br>
                         <button type="submit" class="btn btn-default" id="boton1" name="boton1">Enviar</button>
                </div>

        
                <div class="col-xs-4">
                 
                  </div>
              </div>  
               </form> 

<br><br><br><br><br><br>
      </div>
      <div class="modal-footer">


        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
   


   <div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Salida</h4>
      </div>
      <div class="modal-body">
          

                    <form action="procesarsalida.php" method="POST">
              <div class="form-group">
            
              <p>Ingrese el rut de la persona a continuacion:</p>
                <div>
                
                </div>
                  <div class="col-xs-4">
                   <label for="rut">Rut</label>
                <input type="text" class="form-control" id="rut"
                       name ="rut" placeholder="17123123">


<label for="boton1"></label><br>
                         <button type="submit" class="btn btn-success" id="boton1" name="boton1">Enviar</button>
                </div>

        
                <div class="col-xs-4">
                 
                  </div>
              </div>  
               </form> 

<br><br><br><br><br><br>
      </div>
      <div class="modal-footer">


        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

   
</body>
</html>

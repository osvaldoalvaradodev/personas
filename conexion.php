<?php class DB{   var $conect;  var $BaseDatos;   var $Servidor;  var $Usuario;   var $Clave;   function DB(){    

$this->BaseDatos = "ingresos";
$this->Servidor = "localhost";
$this->Usuario = "ingresosuser";
$this->Clave = "ingreso321";
}
 
function conectar() {
//Defino la zona horaria para que sea la chilena
date_default_timezone_set('America/Santiago');
if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){
echo"Error al conectar a la base de datos";
exit();
}
if (!@mysql_select_db($this->BaseDatos,$con)){
echo "Error al seleccionar la base de datos";
exit();
}
$this->conect=$con;
return true;
}
}


function calcular_personas_en_recinto(){

     //consulto por las salidas de hoy
    $totalRecintoQuery = "select rut,nombre,apellido,(select registro from registro where rut=personas.rut and tipo = 1 order by registro desc limit 1) as UltimoIngreso, (select registro from registro where rut=personas.rut and tipo = 0 order by registro desc limit 1) as UltimaSalida from personas";
    $BuscarRecintoDatos = mysql_query($totalRecintoQuery);
   // $totalRecintoRegistros = mysql_fetch_array($BuscarRecintoDatos);

    $numFilasRecinto = mysql_num_rows($BuscarRecintoDatos);
    $cantidadTotal = 0;
for ($i=0; $i<$numFilasRecinto; $i++)
{


$fila2 = mysql_fetch_array($BuscarRecintoDatos);
$numlista2 = $i + 1;

if ($fila2['UltimoIngreso']>$fila2['UltimaSalida']){

	$cantidadTotal++;

}



}

return $cantidadTotal;
}


?>
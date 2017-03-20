<?php
require_once("phpGrid/conf.php"); 

$dg = new C_DataGrid("SELECT * FROM registro");
$dg -> enable_resize(true);
$dg -> enable_search(true);


$dg -> display();


?>
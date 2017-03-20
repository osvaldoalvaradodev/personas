<?php

session_start();
header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=reporte.xls');

require('../librerias/ExcelLibrary/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Reporte')->setLastModifiedBy('Reporte')->setTitle('Reporte');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet();

$pagina->setTitle('Registros');

$mysql = new mysqli('localhost', 'ingresosuser', 'ingreso321', 'ingresos');

$mysql->set_charset('utf8');


$statement = $mysql->prepare($_SESSION["consultaexcel"]);

$statement->execute();

$result = $statement->get_result();

while($row = $result->fetch_array()) $productos[] = $row;

$pagina->setCellValue('A1', 'NOMBRE');

$pagina->setCellValue('B1', 'APELLIDO');
$pagina->setCellValue('C1', 'RUT');
$pagina->setCellValue('D1', 'REGISTRO');
$pagina->setCellValue('E1', 'TIPO');
$pagina->setCellValue('F1', 'DIA');
$pagina->setCellValue('G1', 'MES');
$pagina->setCellValue('H1', 'AÑO');

$pagina->getStyle('A1:H1')->getFont()->setBold(true);
$pagina->getStyle('A1:H1')->getFont()->setSize(12);

for($i = 0; $i < count($productos); $i++){
	$pagina->setCellValue('A'. ($i+2), $productos[$i]['nombre']);
	$pagina->setCellValue('B'. ($i+2), $productos[$i]['apellido']);
	$pagina->setCellValue('C'. ($i+2), $productos[$i]['rut']);
	$pagina->setCellValue('D'. ($i+2), $productos[$i]['registro']);
	$pagina->setCellValue('E'. ($i+2), $productos[$i]['tipo2']);
	$pagina->setCellValue('F'. ($i+2), $productos[$i]['dia']);
	$pagina->setCellValue('G'. ($i+2), $productos[$i]['mes']);
	$pagina->setCellValue('H'. ($i+2), $productos[$i]['ano']);


}

foreach(range('A', 'H') as $column){
	$pagina->getColumnDimension($column)->setAutoSize(true);
}


//agrega totales 
//$pagina->setCellValue('C9', '=SUM(C2:C7)');

//crear una nueva pagina





//generar archivo de excel
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');

$objWriter->save('php://output');
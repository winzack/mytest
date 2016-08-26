<?php 
/*header("Content-type:application/vnd.ms-excel"); 
header("Content-Disposition:filename=test.xls"); 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
echo "test1\t"; 
echo "test2\t\n"; 
*/
include 'PHPExcel.php';
include 'PHPExcel/Writer/Excel2007.php';
//或者include 'PHPExcel/Writer/Excel5.php'; 用于输出.xls的
$objPHPExcel = new PHPExcel(); //创建一个实例
//创建人
$objPHPExcel->getProperties()->setCreator("test");
//最后修改人
$objPHPExcel->getProperties()->setLastModifiedBy("test");
//标题
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
//题目
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
//描述
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
//关键字
$objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");
//种类
$objPHPExcel->getProperties()->setCategory("Test result file");
//设置当前的sheet
$objPHPExcel->setActiveSheetIndex(0);
//设置sheet的标题

$objPHPExcel->getActiveSheet()->setTitle('Simple');
//设置单元格宽度

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
//设置单元格高度

$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(40);
//合并单元格
/*
$objPHPExcel->getActiveSheet()->mergeCells('A18:E22');
//拆分单元格

$objPHPExcel->getActiveSheet()->unmergeCells('A28:B28');*/
//设置保护cell,保护工作表

$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true); 
$objPHPExcel->getActiveSheet()->protectCells('A3:E13', 'PHPExcel');
//设置格式

$objPHPExcel->getActiveSheet()->getStyle('E4')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
$objPHPExcel->getActiveSheet()->duplicateStyle( $objPHPExcel->getActiveSheet()->getStyle('E4'), 'E5:E13' );
//设置加粗

$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
//设置水平对齐方式（HORIZONTAL_RIGHT，HORIZONTAL_LEFT，HORIZONTAL_CENTER，HORIZONTAL_JUSTIFY）

$objPHPExcel->getActiveSheet()->getStyle('D11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
//设置垂直居中

$objPHPExcel->getActiveSheet()->getStyle('A18')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
//设置字号

$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);
//设置边框

$objPHPExcel->getActiveSheet()->getStyle('A1:I20')->getBorders()->getAllBorders()->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN); 
//设置边框颜色


$objPHPExcel->getActiveSheet()->getStyle('D13')->getBorders()->getLeft()->getColor()->setARGB('FF993300');
$objPHPExcel->getActiveSheet()->getStyle('D13')->getBorders()->getTop()->getColor()->setARGB('FF993300');
$objPHPExcel->getActiveSheet()->getStyle('D13')->getBorders()->getBottom()->getColor()->setARGB('FF993300');
$objPHPExcel->getActiveSheet()->getStyle('E13')->getBorders()->getTop()->getColor()->setARGB('FF993300');
$objPHPExcel->getActiveSheet()->getStyle('E13')->getBorders()->getBottom()->getColor()->setARGB('FF993300');
$objPHPExcel->getActiveSheet()->getStyle('E13')->getBorders()->getRight()->getColor()->setARGB('FF993300');
 

//插入图像


$objDrawing = new PHPExcel_Worksheet_Drawing();
/*设置图片路径 切记：只能是本地图片*/ 
$objDrawing->setPath('no-pkey.jpg');
/*设置图片高度*/ 
$objDrawing->setHeight(180);//照片高度
$objDrawing->setWidth(150); //照片宽度
/*设置图片要插入的单元格*/
$objDrawing->setCoordinates('E2');
 /*设置图片所在单元格的格式*/
$objDrawing->setOffsetX(5);
$objDrawing->setRotation(5);
$objDrawing->getShadow()->setVisible(true);
$objDrawing->getShadow()->setDirection(50);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//设置单元格背景色

$objPHPExcel->getActiveSheet(0)->getStyle('A1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet(0)->getStyle('A1')->getFill()->getStartColor()->setARGB('FFCAE8EA');
//最后输入浏览器，导出Excel


$savename='导出Excel示例';
$ua = $_SERVER["HTTP_USER_AGENT"];
$datetime = date('Y-m-d', time());        
if (preg_match("/MSIE/", $ua)) {
    $savename = urlencode($savename); //处理IE导出名称乱码
} 

// excel头参数  
header('Content-Type: application/vnd.ms-excel');  
header('Content-Disposition: attachment;filename="'.$savename.'.xls"');  //日期为文件名后缀  
header('Cache-Control: max-age=0'); 
$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //excel5为xls格式，excel2007为xlsx格式  
$objWriter->save('php://output');


/*$DB_SERVER = "localhost";
$DB_USER = "root";
$DB_PWD = "";
$DB_DBNAME = "test";
$DB_TBLNAME = "";
$con = mysql_connect($DB_SERVER,$DB_USER,$DB_PWD) or die("Couldn@#t connect."); 
$db = mysql_select_db($DB_DBNAME,$con);
$db = mysql_select_db($DB_DBNAME,$con)*/;
/*$i=0;
$now = mktime();
while($i<1000000){
	mysql_query("insert into test values(1,'test')");
	$i++;
} */
/*while($row = mysql_fetch_array($result)){
	//json_encode($row);
	var_dump($row);
	print_r($row);
}*/
//echo"写入成功,耗时：",mktime()-$now;
//mysql_query("SET AUTOCOMMIT=0");
/*
$now = mktime();
mysql_query("BEGIN");
for ($i=0; $i < 100; $i++) { 
	for ($j=0; $j < 10000; $j++) { 
		$sql = "INSERT INTO test values(1,'test')";
		$res = mysql_query($sql);
		mysql_query("COMMIT");
	}
}
mysql_close($con);
echo"写入成功,耗时：",mktime()-$now;*/
?> 
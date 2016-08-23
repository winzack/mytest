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
$DB_SERVER = "localhost";
$DB_USER = "root";
$DB_PWD = "";
$DB_DBNAME = "test";
$DB_TBLNAME = "";
$con = mysql_connect($DB_SERVER,$DB_USER,$DB_PWD) or die("Couldn@#t connect."); 
$db = mysql_select_db($DB_DBNAME,$con);
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
echo"写入成功,耗时：",mktime()-$now;
?> 
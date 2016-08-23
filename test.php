<?php

for($j = 0; $j < 10; $j++){
	$rows = array();
		for ($i = 0; $i < 10; $i++) {
			array_push($rows, array($j*10+$i+1, 'test'));
		}
		//echo count($rows)."</br>";
		echo json_encode($rows)."end"."</br></br>";
		//$args = array_fill(0, count($rows) * count($rows[0]), '?');
		//echo json_encode($args)."</br>";
}
?>
<?php
try {
	$dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(
		PDO::ATTR_PERSISTENT => true));
	$t1 = microtime(true);
	$now = mktime();
/*	for($j = 0; $j < 100; $j++){
		$rows = array(
		array($j*10000, 'test'),
		);
		for ($i = 0; $i < 10000; $i++) {
			array_push($rows, array($j*10000+$i+1, 'test'));
		}
		echo count($rows)."</br>";
		
		//$args = array_fill(0, count($rows) * count($rows[0]), '?');
		//echo json_encode($args)."</br>";
		$params = array();
		$query = "INSERT INTO test (id, name) VALUES ";
		foreach ($rows as $row) {
			$query .= "(?,?),";
			foreach ($row as $value) {
				$params[] = $value;
			}
		}
		$query = substr($query, 0, -1);
		//echo $query."</br>";
		$stmt = $dbh->prepare($query);
		if (!$stmt) {
			echo "\nPDO::errorInfo():\n";
			print_r($dbh->errorInfo());
		}
		$r = $stmt->execute($params);
	}*/
	for($j = 0; $j < 100; $j++){
		$rows = array(
		);
		for ($i = 0; $i < 10000; $i++) {
			array_push($rows, array($j*10000+$i+1, 'test'));
		}
		//echo count($rows)."</br>";
		
		//$args = array_fill(0, count($rows) * count($rows[0]), '?');
		//echo json_encode($args)."</br>";
		$params = array();
		$query = "INSERT INTO test (id, name) VALUES ";
		foreach ($rows as $row) {
			$query .= "(?,?),";
			foreach ($row as $value) {
				$params[] = $value;
			}
		}
		$query = substr($query, 0, -1);
		//echo $query."</br>";
		$stmt = $dbh->prepare($query);
		if (!$stmt) {
			echo "\nPDO::errorInfo():\n";
			print_r($dbh->errorInfo());
		}
		$r = $stmt->execute($params);
	}
	$t2 = microtime(true);
	echo (($t2 - $t1) * 1000) . 'ms'."</br>";
	echo"写入成功,耗时：",mktime()-$now;
	$dbh = null;
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
?>
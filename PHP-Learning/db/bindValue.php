<?php

try {
	$db = new PDO('mysql:host=localhost;dbname=rockst;charset=utf8', 'root', 'letmein');
	
	$sql = "SELECT * FROM report WHERE tag = :tag";
	$sth = $db->prepare($sql);
	$sth->bindValue(':tag', '201612');
	//$sth->bindParam(':tag', $tag);
	
	//$tag = '201610';
	$sth->execute();
	$rows = $sth->fetchAll();
	print_r($rows);
	
} catch (PDOException $e) {
	echo 'cant connect mysql: ' . $e->getMessage();
}
	
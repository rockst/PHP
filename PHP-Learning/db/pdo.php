<?php
try {
	// connect
	$db = new PDO ( 'mysql:host=localhost;dbname=rockst;charset=utf8', 'root', 'letmein' );
	
	/* select useing prepare */
	try {
		$rs = $db->prepare ( "SELECT * FROM report HERE tag = :tag" );
		$params = array (
				"tag" => "201303" 
		);
		$rs->execute ( $params );
		if($rs->errorCode() != 0000) {
			throw new Exception(var_dump($rs->errorInfo(),1));
		}
		$row = $rs->fetch ( PDO::FETCH_ASSOC );
		print_r ( $row );
	} catch (Exception $e) {
		echo $e->getMessage();
	}
		

	
	/*
	$rs = $db->query ( 'SELECT * FROM `report`' );
	$rows = $rs->fetchAll ( PDO::FETCH_ASSOC );
	print_r ( $rows [0] );
	echo $rs->rowCount ();
	echo '\n';
	
	$rs = $db->query ( "select count(1) FROM report" );
	echo $rs->fetchColumn ();
	echo '\n';
	
	$sql = "INSERT INTO test VALUES  (0, :name)";
	$rs = $db->prepare ( $sql );
	$params = array (
			"name" => "201612" 
	);
	$rs->execute ( $params );
	$temp = $rs->fetch ( PDO::FETCH_ASSOC );
	echo $db->lastInsertId ();
	echo '\n';
	*/
} catch ( PDOException $e ) {
	echo $e->getMessage ();
}

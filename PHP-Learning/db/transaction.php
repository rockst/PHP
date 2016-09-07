<?php
require 'connect.php';

try {
	$db->beginTransaction();
	
	$db->exec("UPDATE report SET w2f_rate = 0 WHERE tag LIKE '2016%'");
	$db->exec("UPDATE report SET f2w_rate = 0 WHERE tag LIKE '2016%'");
	
	$db->commit();
	
} catch (PDOException $e) {
	$db->rollBack();
	echo $e->getMessage();
}
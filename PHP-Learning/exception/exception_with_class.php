<?php
class AAAException extends Exception {}

class AAAA {
	function ship($s) {
		if(empty($s)) {
			throw new Exception('empty');
		}
		if($s == 'a') {
			throw new AAAException('a'); 
		}
		return true;
	}
}

$a = new AAAA();
try {
	$b = 'b';
	$a->ship($b);
	echo 'ok';
} catch (AAAException $e) {
	echo $e->getMessage();
} catch (Exception $e) {
	echo $e->getMessage();
}
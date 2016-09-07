<?php
function handleMissedException($e) {
	echo 'Sorry';
	
	error_log('Exception: '. $e->getMessage() . ' in file: ' . $e->getFile() . ' on line ' . $e->getLine());
}

set_exception_handler('handleMissedException');

throw new Exception('aaaaaaaaaaaaaa');